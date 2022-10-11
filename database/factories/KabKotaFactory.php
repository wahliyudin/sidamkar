<?php

namespace Database\Factories;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KabKota>
 */
class KabKotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'provinsi_id' => $this->faker->randomElement(Provinsi::query()->pluck('id')->toArray()),
            'name' => $this->faker->city()
        ];
    }
}
