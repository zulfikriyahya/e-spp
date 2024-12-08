<?php

namespace App\Filament\Resources\JenisPengeluaranResource\Pages;

use App\Filament\Resources\JenisPengeluaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewJenisPengeluaran extends ViewRecord
{
    protected static string $resource = JenisPengeluaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
