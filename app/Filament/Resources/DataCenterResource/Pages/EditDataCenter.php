<?php

namespace App\Filament\Resources\DataCenterResource\Pages;

use App\Filament\Resources\DataCenterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataCenter extends EditRecord
{
    protected static string $resource = DataCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
