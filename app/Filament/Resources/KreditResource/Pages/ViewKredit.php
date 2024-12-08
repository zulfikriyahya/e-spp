<?php

namespace App\Filament\Resources\KreditResource\Pages;

use App\Filament\Resources\KreditResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKredit extends ViewRecord
{
    protected static string $resource = KreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
