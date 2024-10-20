<?php

namespace App\Filament\Resources\DataCenterResource\Pages;

use App\Filament\Resources\DataCenterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataCenter extends CreateRecord
{
    protected static string $resource = DataCenterResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
