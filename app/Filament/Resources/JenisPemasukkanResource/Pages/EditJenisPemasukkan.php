<?php

namespace App\Filament\Resources\JenisPemasukkanResource\Pages;

use App\Filament\Resources\JenisPemasukkanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisPemasukkan extends EditRecord
{
    protected static string $resource = JenisPemasukkanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
