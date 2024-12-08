<?php

namespace App\Filament\Resources\PemasukkanResource\Pages;

use App\Filament\Resources\PemasukkanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemasukkans extends ListRecords
{
    protected static string $resource = PemasukkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
