<?php

namespace App\Filament\Resources\AccountResource\Pages;

use App\Filament\Resources\AccountResource;
use App\Models\Account;
use App\Models\cn_lines;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAccount extends CreateRecord
{
    protected static string $resource = AccountResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    /*
    protected function mutateFormDataBeforeCreate(array $data):array
    {
        Account::count() == 0 ? $data['id'] = 1 : $data['id'] = Account::all()->last()->id + 1;

        if ((isset($data['inbound']) && isset($data['outbound']) )) {
            if((!empty($data['inbound']) && !empty($data['outbound']))){
                $selected_lines = [
                    'inbound' => array_values(array_diff($data['inbound'], $data['outbound'])),
                    'outbound' => array_values(array_diff($data['outbound'], $data['inbound'])),
                    'both' => array_values(array_intersect($data['inbound'], $data['outbound'])),
                ];

                foreach($selected_lines as $type => $lines){
                    foreach ($lines as $lineId) {
                        // $line->type = $type;
                        // $line->save();
                    }
                }
            }
        }
        else if(isset($data['inbound'])){
            if(empty($data['inbound'])){
                $data['inbound'] = array_values($data['inbound']);
            }
            // dd($data);
        }
        else if(isset($data['outbound'])){
            if(empty($data['outbound'])){
                $data['outbound'] = array_values($data['outbound']);
            }
            // dd($data);
        }
        else{
            unset($data['inbound']);
            unset($data['outbound']);
        }

        // dd($selected_lines);
        return $data;
    }*/
}
