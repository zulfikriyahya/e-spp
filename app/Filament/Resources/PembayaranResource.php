<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pembayaran;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;
    protected static ?string $navigationGroup = ('Pembayaran');
    protected static ?int $sort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('deskripsi'),
                Forms\Components\TextInput::make('nominal')
                    ->required()
                    ->prefix('Rp. ')
                    ->numeric(),
                Forms\Components\FileUpload::make('kwitansi')
                    ->image()
                    ->imageEditor()
                    ->maxSize(200)
                    ->minSize(10)
                    ->storeFileNamesIn('attachment_file_names')
                    ->directory('img/kwitansi/')
                    ->required(),
                Forms\Components\Select::make('siswa_id')
                    ->relationship('siswa', 'nama')
                    ->required(),
                Forms\Components\Select::make('bulan_id')
                    ->relationship('bulan', 'nama')
                    ->required(),
                Forms\Components\Select::make('tahun_id')
                    ->relationship('tahun', 'nama')
                    ->required(),
                Forms\Components\Select::make('jenis_pembayaran_id')
                    ->relationship('jenis_pembayaran', 'nama')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'lunas' => 'Lunas',
                        'terhutang' => 'Terhutang',
                    ])
                    ->required(),
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
                Tables\Columns\TextColumn::make('nominal')
                    ->numeric()
                    ->prefix('Rp. ')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('kwitansi')
                    ->label('Bukti Pembayaran'),
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bulan.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_pembayaran.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'lunas' => 'success',
                        'terhutang' => 'danger',
                    })
                    ->searchable(),
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
                TrashedFilter::make()
                // SelectFilter::make([
                //     'lunas' => 'Lunas',
                //     'terhutang' => 'Terhutang',
                // ])
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->visible(auth()->user()->isAdmin),
                    Tables\Actions\DeleteAction::make()
                        ->visible(auth()->user()->isAdmin),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ])
                    ->visible(auth()->user()->isAdmin),
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'view' => Pages\ViewPembayaran::route('/{record}'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
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
