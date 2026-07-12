<?php

namespace App\Filament\Admin\Resources\KategoriUsiaResource\Pages;

use App\Filament\Admin\Resources\KategoriUsiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriUsias extends ListRecords
{
    protected static string $resource = KategoriUsiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
