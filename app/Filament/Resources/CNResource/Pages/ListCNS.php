<?php

namespace App\Filament\Resources\CNResource\Pages;

use App\Filament\Resources\CNResource;
use App\Models\CN;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCNS extends ListRecords
{
    protected static string $resource = CNResource::class;

    protected function getHeaderActions(): array
    {   
        if(CN::count()>=1)return [Actions\CreateAction::make()->label('Add CN')];
        return [];
    }
}
