<?php

namespace App\Filament\Resources\PemasukkanResource\Pages;

use App\Filament\Resources\PemasukkanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemasukkan extends EditRecord
{
    protected static string $resource = PemasukkanResource::class;

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
