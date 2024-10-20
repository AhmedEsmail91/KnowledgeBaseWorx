<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $aheevas=\App\Models\Aheeva::all();
        $KASs=\App\Models\Kaspersky::all()->toArray();
        $branches=\App\Models\Branch::all()->toArray();
        $services=\App\Models\Service::all()->toArray();

        return [
            'name'=>$this->faker->name,
            'job_nature'=>$this->faker->sentence,
            'services'=>$aheevas->random(rand(1, $aheevas->count()))->toArray(),
            'branches'=>$branches[array_rand($branches)],

        ];
    }
}
