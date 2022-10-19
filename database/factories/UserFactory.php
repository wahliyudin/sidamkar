<?php

namespace Database\Factories;

use App\Models\KabKota;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make(123456789), // password
            'remember_token' => Str::random(10),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (User $user) {
            //
        })->afterCreating(function (User $user) {
            // $user->attachRole('kab_kota');
            // $user->userProvKabKota([
            //     'nomenklatur_perangkat_daerah' => fake()->numberBetween(100000, 999999),
            //     'kab_kota_id' => fake()->randomElement(KabKota::query()->pluck('id')->toArray()),
            // ]);

            $user->attachRole('provinsi');
            $user->userProvKabKota([
                'nomenklatur_perangkat_daerah' => fake()->numberBetween(100000, 999999),
                'provinsi_id' => fake()->randomElement(Provinsi::query()->pluck('id')->toArray()),
            ]);
        });
    }
}
