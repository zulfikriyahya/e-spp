<?php

namespace App\Filament\Resources\KreditResource\Pages;

use App\Filament\Resources\KreditResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKredit extends EditRecord
{
    protected static string $resource = KreditResource::class;

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
