<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Profile';
    protected static ?string $label = 'Pengguna';
    protected static ?string $slug = 'pengguna';
    protected static ?int $sort = 2;
    protected static ?string $navigationBadgeTooltip = 'Jumlah Pengguna';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count() . ' Akun';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->string(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->rule(fn($record) => $record === null ? 'unique:users,email' : 'unique:users,email,' . $record->id)->dehydrateStateUsing(fn($state) => $state ? $state : null)
                    ->required(),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(fn($record) => $record === null) // Required only on create
                    ->dehydrateStateUsing(fn($state, $record) => $state ? bcrypt($state) : $record->password),

                Forms\Components\Select::make('role')
                    ->required()
                    ->relationship('role', 'name')
                    ->multiple()
                    ->native(false),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '4:3',
                        '3:4',
                        '1:1',
                    ])
                    ->maxSize(1024)
                    ->directory(url('/storage/avatar/'))
                    ->minSize(10)
                    ->fetchFileInformation(false),
                Forms\Components\Toggle::make('isActive')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Avatar')
                    ->circular()
                    ->defaultImageUrl(url('/storage/avatar/default.png'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '' => 'gray',
                        'Administrator', 'administrator' => 'primary',
                        'user' => 'success',
                    })
                    ->searchable(),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label('Verified')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('isActive')
                    ->boolean(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
