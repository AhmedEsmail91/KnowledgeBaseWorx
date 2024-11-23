<?php

namespace App\Filament\Resources\CNResource\Pages;

use App\Filament\Resources\CNResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCN extends EditRecord
{
    protected static string $resource = CNResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
