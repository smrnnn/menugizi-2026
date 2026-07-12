<?php

namespace App\Filament\Admin\Resources\KategoriUsiaResource\Pages;

use App\Filament\Admin\Resources\KategoriUsiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriUsia extends EditRecord
{
    protected static string $resource = KategoriUsiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
