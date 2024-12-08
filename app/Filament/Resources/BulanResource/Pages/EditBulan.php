<?php

namespace App\Filament\Resources\BulanResource\Pages;

use App\Filament\Resources\BulanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBulan extends EditRecord
{
    protected static string $resource = BulanResource::class;

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
