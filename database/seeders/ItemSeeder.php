<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items_network_22 = [
            // floor
            ['phone_number' => '226845390', 'operator' => 'WE VDSL', 'package' => '250', 'wifi' => 'no'],
            ['phone_number' => '226845391', 'operator' => 'WE VDSL', 'package' => '250', 'wifi' => 'no'],
            ['phone_number' => '226845392', 'operator' => 'WE VDSL', 'package' => '250', 'wifi' => 'no'],
            ['phone_number' => '226845393', 'operator' => 'WE VDSL', 'package' => '250', 'wifi' => 'no'],
            ['phone_number' => '226845394', 'operator' => 'WE VDSL', 'package' => '250', 'wifi' => 'no'],
            ['phone_number' => '226845396', 'operator' => 'WE VDSL', 'package' => '250', 'wifi' => 'no'],
            ['phone_number' => '226845403', 'operator' => 'Vodafone', 'package' => '300G', 'wifi' => 'no'],
            ['phone_number' => '226845405', 'operator' => 'WE VDSL', 'package' => '250', 'wifi' => 'no'],
            ['phone_number' => '226845406', 'operator' => 'WE VDSL', 'package' => '600', 'wifi' => 'Auf-Mori'],
            ['phone_number' => '226845407', 'operator' => 'Orange', 'package' => '30M 500G', 'wifi' => 'no'],
        ];
        $items_network_10 = [
            ['phone_number' => '224672561', 'operator' => 'Vodafone', 'package' => '', 'wifi' => '22nd Rack'],
            ['phone_number' => '224826219', 'operator' => 'WE VDSL', 'package' => '', 'wifi' => 'Btech-EFB 22nd FR'],
            ['phone_number' => '224826218', 'operator' => 'WE VDSL', 'package' => '', 'wifi' => 'Btech'],
            ['phone_number' => '224672566', 'operator' => 'Orange', 'package' => '', 'wifi' => '22nd Rack'],
            ['phone_number' => '224672569', 'operator' => 'WE VDSL', 'package' => '', 'wifi' => 'Mince-Tamara-F&A'],
            ['phone_number' => '224672537', 'operator' => 'WE', 'package' => '250G', 'wifi' => 'HR Team'],
            ['phone_number' => '224672544', 'operator' => 'WE', 'package' => '250G', 'wifi' => 'Aramex'],
        ];
        $items_network_maadi = [
            ['phone_number' => '227050067', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '227050063', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '227050082', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '227050078', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '227050083', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '227050201', 'operator' => 'Etisalat', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '227050209', 'operator' => 'Etisalat', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '227048471', 'operator' => '', 'package' => '', 'wifi' => ''],
        ];
        $items_network_togareen = [
            ['phone_number' => '223420170', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '223420171', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '223420173', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '223420180', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '223420181', 'operator' => 'WE', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '223420182', 'operator' => 'Etisalat', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '223420183', 'operator' => 'Etisalat', 'package' => '600G', 'wifi' => ''],
            ['phone_number' => '223420184', 'operator' => '', 'package' => '', 'wifi' => ''],
        ];
        $index=0;
        foreach ($items_network_22 as $item) {
            $index++;
            Item::create([
                "name"=>"N-F-22 Router-{$index}",
                'description' => [
                    "PN:".$item['phone_number'],
                    "OP:".$item['operator'],
                    "PK:".$item['package'],
                    "WF:".$item['wifi'],
                ],
                'type' => 'Network',
            ]);
        }
    }
}
