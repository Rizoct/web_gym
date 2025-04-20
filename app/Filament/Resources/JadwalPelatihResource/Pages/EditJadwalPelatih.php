<?php

namespace App\Filament\Resources\JadwalPelatihResource\Pages;

use App\Filament\Resources\JadwalPelatihResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalPelatih extends EditRecord
{
    protected static string $resource = JadwalPelatihResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
