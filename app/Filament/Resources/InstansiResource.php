<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Instansi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InstansiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InstansiResource\RelationManagers;

class InstansiResource extends Resource
{
    protected static ?string $model = Instansi::class;
    protected static ?string $navigationGroup = 'Administrasi';
    protected static ?int $sort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Instansi')
                    ->required(),
                Forms\Components\TextInput::make('npsn')
                    ->label('Nomor Pokok Sekolah Nasional'),
                Forms\Components\TextInput::make('nss')
                    ->label('Nomor Statistik Sekolah'),
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo Instansi')
                    ->maxSize(1024)
                    ->minSize(10)
                    ->fetchFileInformation(false)
                    ->directory('img/logo')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '1:1',
                        '4:3',
                        '3:4',
                    ]),
                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat'),
                Forms\Components\TextInput::make('website')
                    ->label('Website'),
                Forms\Components\TextInput::make('email')
                    ->label('Surel')
                    ->email(),
                Forms\Components\TextInput::make('telepon')
                    ->tel()
                    ->label('Telepon'),
                Forms\Components\TextInput::make('nama_bank')
                    ->label('Nama Bank'),
                Forms\Components\TextInput::make('nama_rekening')
                    ->label('Nama Rekening'),
                Forms\Components\TextInput::make('nomor_rekening')
                    ->label('Nomor Rekening'),
                Forms\Components\Select::make('pimpinan_id')
                    ->label('Nama Pimpinan')
                    ->required()
                    ->relationship('pimpinans', 'nama'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('npsn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nss')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_bank')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pimpinans.nama'),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListInstansis::route('/'),
            'create' => Pages\CreateInstansi::route('/create'),
            'view' => Pages\ViewInstansi::route('/{record}'),
            'edit' => Pages\EditInstansi::route('/{record}/edit'),
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
