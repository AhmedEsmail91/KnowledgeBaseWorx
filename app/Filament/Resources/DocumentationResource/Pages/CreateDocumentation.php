<?php

namespace App\Filament\Resources\DocumentationResource\Pages;

use App\Filament\Resources\DocumentationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateDocumentation extends CreateRecord
{
    protected static string $resource = DocumentationResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeCreate(array $data):array
    {   
        if(!(Auth::user()->section->title==='Management')) $data['section_id'] = Auth::user()->section->id;

        $data['created_by']=Auth::user()->id;
        return $data;
    }

}
