<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Debit;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DebitResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DebitResource\RelationManagers;

class DebitResource extends Resource
{
    protected static ?string $model = Debit::class;
    protected static ?string $navigationGroup = 'Jurnal';
    protected static ?int $sort = 0;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('deskripsi'),
                Forms\Components\TextInput::make('bulan_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tahun_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pemasukkan_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pembayaran_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bulan_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pemasukkan_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pembayaran_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListDebits::route('/'),
            'create' => Pages\CreateDebit::route('/create'),
            'view' => Pages\ViewDebit::route('/{record}'),
            'edit' => Pages\EditDebit::route('/{record}/edit'),
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