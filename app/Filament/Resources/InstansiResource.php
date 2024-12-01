<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Instansi;
use App\Models\Provinsi;
use Filament\Forms\Form;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Tabs;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\IconPosition;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\InstansiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InstansiResource\RelationManagers;

class InstansiResource extends Resource
{
    protected static ?string $model = Instansi::class;
    protected static ?string $navigationGroup = 'Profile';
    protected static ?string $label = 'Instansi';
    protected static ?string $slug = 'instansi';
    protected static ?int $sort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Tab Instansi
                Tabs::make('Tab Instansi')
                    ->tabs([
                        Tabs\Tab::make('Instansi')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section Instansi
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Instansi')
                                    ->maxLength(5)
                                    ->maxLength(50)
                                    ->placeholder('Masukkan Nama Instansi')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('logo')
                                    ->label('Logo Instansi')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '3:4',
                                        '4:3',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    // ->fetchFilenameInformation(false)
                                    ->directory('logo')
                                    ->required(),
                                Forms\Components\FileUpload::make('stempel')
                                    ->label('Stempel Instansi')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '3:4',
                                        '4:3',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    // ->fetchFilenameInformation(false)
                                    ->directory('logo')
                                    ->required(),
                                Forms\Components\TextInput::make('npsn')
                                    ->label('NPSN')
                                    ->placeholder('20600***')
                                    ->maxLength(8)
                                    ->maxLength(8)
                                    ->numeric()
                                    ->required(),
                                Forms\Components\Select::make('status_instansi')
                                    ->label('Status Instansi')
                                    ->options([
                                        'Negeri',
                                        'Swasta'
                                    ])
                                    ->native(false)
                                    ->required(),
                                Forms\Components\TextInput::make('nama_kepala_yayasan')
                                    ->label('Nama Kepala Instansi')
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Tabs\Tab::make('Kontak')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section Kontak
                                Forms\Components\TextInput::make('telepon')
                                    ->label('Nomor Telepon')
                                    ->placeholder('+628***********')
                                    ->minLength(10)
                                    ->maxLength(15)
                                    ->tel()
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email Instansi')
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('website')
                                    ->label('Website')
                                    ->url()
                                    ->required(),
                            ])->columns(3),

                        Tabs\Tab::make('Alamat')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section Alamat
                                Forms\Components\TextInput::make('alamat')
                                    ->required(),
                                Forms\Components\Select::make('negara_id')
                                    ->label('Negara')
                                    ->relationship('negara', 'nama')
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(function (Set $set) {
                                        $set('provinsi_id', null);
                                        $set('kabupaten_id', null);
                                        $set('kecamatan_id', null);
                                        $set('kelurahan_id', null);
                                    })
                                    ->native(false)
                                    ->required(),
                                Forms\Components\Select::make('provinsi_id')
                                    ->label('Provinsi')
                                    ->options(fn(Get $get): Collection => Provinsi::query()
                                        ->where('negara_id', $get('negara_id'))
                                        ->pluck('nama', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(function (Set $set) {
                                        $set('kabupaten_id', null);
                                        $set('kecamatan_id', null);
                                        $set('kelurahan_id', null);
                                    })
                                    ->required(),
                                Forms\Components\Select::make('kabupaten_id')
                                    ->label('Kabupaten')
                                    ->options(fn(Get $get): Collection => Kabupaten::query()
                                        ->where('provinsi_id', $get('provinsi_id'))
                                        ->pluck('nama', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(function (Set $set) {
                                        $set('kecamatan_id', null);
                                        $set('kelurahan_id', null);
                                    })
                                    ->required(),
                                Forms\Components\Select::make('kecamatan_id')
                                    ->label('Kecamatan')
                                    ->options(fn(Get $get): Collection => Kecamatan::query()
                                        ->where('kabupaten_id', $get('kabupaten_id'))
                                        ->pluck('nama', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(function (Set $set) {
                                        $set('kelurahan_id', null);
                                    })
                                    ->required(),
                                Forms\Components\Select::make('kelurahan_id')
                                    ->label('Kelurahan')
                                    ->options(fn(Get $get): Collection => Kelurahan::query()
                                        ->where('kecamatan_id', $get('kecamatan_id'))
                                        ->pluck('nama', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->required(),
                            ])->columns(2),

                        Tabs\Tab::make('Bank')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section Bank
                                Forms\Components\TextInput::make('nama_bank')
                                    ->required(),
                                Forms\Components\TextInput::make('nama_rekening')
                                    ->required(),
                                Forms\Components\TextInput::make('nomor_rekening')
                                    ->required()
                                    ->numeric(),
                            ])->columns(3),
                    ]),

                // Tab Jenjang
                Tabs::make('Tab Jenjang')
                    ->tabs([
                        Tabs\Tab::make('PAUD')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section PAUD
                                Forms\Components\TextInput::make('nama_kepala_paud')
                                    ->label('Nama Kepala PAUD')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('nip_kepala_paud')
                                    ->label('NIP Kepala PAUD')
                                    ->numeric(),
                                Forms\Components\Select::make('akreditasi_paud')
                                    ->label('Akreditasi PAUD')
                                    ->options([
                                        'A',
                                        'B',
                                        'C',
                                        'D',
                                    ])
                                    ->native(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('tte_kepala_paud')
                                    ->label('TTE Kepala PAUD')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('kop_surat_paud')
                                    ->label('Kop Surat PAUD')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                            ])
                            ->columns(2),
                        Tabs\Tab::make('TK')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section TK
                                Forms\Components\TextInput::make('nama_kepala_tk')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('nip_kepala_tk')
                                    ->numeric(),
                                Forms\Components\Select::make('akreditasi_tk')
                                    ->label('Akreditasi TK')
                                    ->options([
                                        'A',
                                        'B',
                                        'C',
                                        'D',
                                    ])
                                    ->native(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('tte_kepala_tk')
                                    ->label('TTE Kepala TK')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('kop_surat_tk')
                                    ->label('Kop Surat TK')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                            ])
                            ->columns(2),
                        Tabs\Tab::make('SD')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section SD
                                Forms\Components\TextInput::make('nama_kepala_sd')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('nip_kepala_sd')
                                    ->numeric(),
                                Forms\Components\Select::make('akreditasi_sd')
                                    ->label('Akreditasi SD')
                                    ->options([
                                        'A',
                                        'B',
                                        'C',
                                        'D',
                                    ])
                                    ->native(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('tte_kepala_sd')
                                    ->label('TTE Kepala SD')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('kop_surat_sd')
                                    ->label('Kop Surat SD')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                            ])
                            ->columns(2),
                        Tabs\Tab::make('SMP')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section SMP
                                Forms\Components\TextInput::make('nama_kepala_smp')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('nip_kepala_smp')
                                    ->numeric(),
                                Forms\Components\Select::make('akreditasi_smp')
                                    ->label('Akreditasi SMP')
                                    ->options([
                                        'A',
                                        'B',
                                        'C',
                                        'D',
                                    ])
                                    ->native(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('tte_kepala_smp')
                                    ->label('TTE Kepala SMP')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('kop_surat_smp')
                                    ->label('Kop Surat SMP')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                            ])
                            ->columns(2),
                        Tabs\Tab::make('SMA')
                            ->icon('heroicon-m-bell')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                // Section SMA
                                Forms\Components\TextInput::make('nama_kepala_sma')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('nip_kepala_sma')
                                    ->numeric(),
                                Forms\Components\Select::make('akreditasi_sma')
                                    ->label('Akreditasi SMA')
                                    ->options([
                                        'A',
                                        'B',
                                        'C',
                                        'D',
                                    ])
                                    ->native(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('tte_kepala_sma')
                                    ->label('TTE Kepala SMA')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                                Forms\Components\FileUpload::make('kop_surat_sma')
                                    ->label('Kop Surat SMA')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '4:3',
                                        '3:4',
                                        '1:1'
                                    ])
                                    ->minSize(10)
                                    ->maxSize(1024)
                                    ->fetchFileInformation(false)
                                    ->required(),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('logo')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('stempel')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('npsn')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('telepon')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('status_instansi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_kepala_yayasan')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('nama_kepala_paud')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nip_kepala_paud')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tte_kepala_paud')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('akreditasi_paud')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kop_surat_paud')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_kepala_tk')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nip_kepala_tk')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tte_kepala_tk')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('akreditasi_tk')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kop_surat_tk')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_kepala_sd')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nip_kepala_sd')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tte_kepala_sd')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('akreditasi_sd')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kop_surat_sd')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_kepala_smp')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nip_kepala_smp')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tte_kepala_smp')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('akreditasi_smp')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kop_surat_smp')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_kepala_sma')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nip_kepala_sma')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tte_kepala_sma')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('akreditasi_sma')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kop_surat_sma')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_bank')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_rekening')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nomor_rekening')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('negara.id')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('provinsi.id')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kabupaten.id')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kecamatan.id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kelurahan.nama')
                    ->label('Kelurahan')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Dihapus')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                ])
                // ->label('More actions')
                // ->icon('heroicon-m-ellipsis-vertical')
                // ->size(ActionSize::Small)
                // ->color('primary')
                // ->button()
                // ->dropdown(false)
                ,
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
