<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches=\App\Models\Branch::all()->toArray();
        $items=\App\Models\Item::all()->pluck(['id','name'])->toArray();
        
        foreach($branches as $branch){
            $numberOfDCs=rand(1,3);
            for($i=0; $i<$numberOfDCs; $i++){
                $racks=range(1,4);
                for($j=0; $j<count($racks); $j++){
                    
                }
            }
        }
    }
}
