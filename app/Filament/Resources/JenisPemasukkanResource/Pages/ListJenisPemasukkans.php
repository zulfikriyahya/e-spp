<?php

namespace App\Filament\Resources\JenisPemasukkanResource\Pages;

use App\Filament\Resources\JenisPemasukkanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisPemasukkans extends ListRecords
{
    protected static string $resource = JenisPemasukkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
