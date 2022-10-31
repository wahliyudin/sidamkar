<?php

namespace Database\Factories;

use App\Models\JenisKegiatan;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unsur>
 */
class UnsurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role_id' => fake()->randomElement(Role::query()->pluck('id')->toArray()),
            'jenis_kegiatan_id' => fake()->randomElement(JenisKegiatan::query()->pluck('id')->toArray()),
            'nama' => fake()->sentence()
        ];
    }
}
