<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataCenter>
 */
class DataCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $items=\App\Models\Item::all()->toArray();
        $racks=range(1,3,1);
        $branches=\App\Models\Branch::all()->toArray();
        foreach($branches as $branch){
            $numberOfDCs=rand(1,3);
            for($i=0; $i<$numberOfDCs; $i++){
                $dc=\App\Models\DataCenter::create([
                    'name'=>$branch['name'].' DC '.($i+1),
                    'branch_id'=>$branch['id']
                ]);
                foreach($racks as $rack){
                    $dc->racks()->create([
                        'name'=>'Rack '.$rack,
                        'branch_id'=>$branch['id']
                    ]);
                }
                foreach($items as $item){
                    $dc->items()->attach($item['id'], ['quantity'=>rand(1,10)]);
                }
            }
        }
        return [
            //
        ];
    }
}
