<?php

namespace App\Filament\Resources\KasperskyResource\Pages;

use App\Filament\Resources\KasperskyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKasperskies extends ListRecords
{
    protected static string $resource = KasperskyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
