<?php

namespace App\Filament\Resources\PemasukkanResource\Pages;

use App\Filament\Resources\PemasukkanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPemasukkan extends ViewRecord
{
    protected static string $resource = PemasukkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
