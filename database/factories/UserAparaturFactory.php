<?php

namespace Database\Factories;

use App\Models\KabKota;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAparatur>
 */
class UserAparaturFactory extends Factory
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
            'nama' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'kab_kota_id' => fake()->randomElement(KabKota::query()->pluck('id')->toArray()),
            'provinsi_id' => fake()->randomElement(Provinsi::query()->pluck('id')->toArray()),
        ];
    }
}
