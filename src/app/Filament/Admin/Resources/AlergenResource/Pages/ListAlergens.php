<?php

namespace App\Filament\Admin\Resources\AlergenResource\Pages;

use App\Filament\Admin\Resources\AlergenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlergens extends ListRecords
{
    protected static string $resource = AlergenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
