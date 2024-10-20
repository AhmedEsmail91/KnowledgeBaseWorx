<?php

namespace App\Filament\Resources\AheevaResource\Pages;

use App\Filament\Resources\AheevaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAheevas extends ListRecords
{
    protected static string $resource = AheevaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
