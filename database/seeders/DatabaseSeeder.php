<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SectionSeeder::class,
            PositionSeeder::class,
            SystemAssetsSeeder::class,
            // AccountSeeder::class,
        ]);
       \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@worxcx.com',
            'password' => Hash::make('password'),
            'position_id' => 10,
        ]);

    \App\Models\Item::factory(10)->create();

    }
}
