<?php

namespace Database\Factories;

use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProvKabKota>
 */
class UserProvKabKotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->randomElement(User::query()->pluck('id')->toArray()),
            'nomenklatur_perangkat_daerah' => fake()->numberBetween(100000, 999999),
            'is_active' => fake()->boolean(),
            'provinsi_id' => fake()->randomElement(Provinsi::query()->pluck('id')->toArray()),
        ];
    }
}
