<?php

namespace Database\Factories;

use App\Models\ButirKegiatan;
use App\Models\SubUnsur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubButirKegiatan>
 */
class SubButirKegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'butir_kegiatan_id' => fake()->randomElement(ButirKegiatan::query()->pluck('id')->toArray()),
            'nama' => fake()->sentence(),
            'satuan_hasil' => fake()->sentence(),
            'score' => fake()->randomFloat(2, max: 2)
        ];
    }
}
