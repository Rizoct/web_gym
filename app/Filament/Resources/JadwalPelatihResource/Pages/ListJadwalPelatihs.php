<?php

namespace App\Filament\Resources\JadwalPelatihResource\Pages;

use App\Filament\Resources\JadwalPelatihResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalPelatihs extends ListRecords
{
    protected static string $resource = JadwalPelatihResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
