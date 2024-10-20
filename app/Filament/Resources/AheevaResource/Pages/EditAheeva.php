<?php

namespace App\Filament\Resources\AheevaResource\Pages;

use App\Filament\Resources\AheevaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAheeva extends EditRecord
{
    protected static string $resource = AheevaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
