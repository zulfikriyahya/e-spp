<?php

namespace App\Filament\Resources\KreditResource\Pages;

use App\Filament\Resources\KreditResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKredits extends ListRecords
{
    protected static string $resource = KreditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
