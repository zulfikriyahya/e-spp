<?php

namespace App\Filament\Resources\JenisPemasukkanResource\Pages;

use App\Filament\Resources\JenisPemasukkanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewJenisPemasukkan extends ViewRecord
{
    protected static string $resource = JenisPemasukkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
