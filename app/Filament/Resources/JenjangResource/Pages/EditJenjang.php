<?php

namespace App\Filament\Resources\JenjangResource\Pages;

use App\Filament\Resources\JenjangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenjang extends EditRecord
{
    protected static string $resource = JenjangResource::class;

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
