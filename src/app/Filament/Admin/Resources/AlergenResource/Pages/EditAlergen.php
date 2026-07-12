<?php

namespace App\Filament\Admin\Resources\AlergenResource\Pages;

use App\Filament\Admin\Resources\AlergenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlergen extends EditRecord
{
    protected static string $resource = AlergenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
