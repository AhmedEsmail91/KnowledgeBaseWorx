<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * For Aheeva, Kaspersky, Branch, Service, Item, DataCenter
     */
    public function run(): void
    {
        $aheevas = [
            ['ip' => '192.168.40.61', 'version' => '1'],
            ['ip' => '192.168.40.62', 'version' => '2'],
            ['ip' => '192.168.40.63', 'version' => '3'],
            ['ip' => '192.168.40.64', 'version' => '4']];

        foreach($aheevas as $aheeva){
            \App\Models\Aheeva::create([
                'ip'=>$aheeva['ip'],
                'version'=>$aheeva['version']
            ]);
        }
        $KASs = [
            ['ip' => '192.168.40.50'],
            ['ip' => '192.168.40.51'],
            ['ip' => '192.168.40.52'],
            ['ip' => '192.168.40.53']];
        
        foreach($KASs as $KAS){
            \App\Models\Kaspersky::create([
                'ip' => $KAS['ip']
            ]);
        }
        \App\Models\Branch::factory(5)->create();
        \App\Models\Service::factory(10)->create();
        // \App\Models\Item::factory(10)->create();
        
    }
}
