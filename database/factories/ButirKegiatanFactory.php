<?php

namespace Database\Factories;

use App\Models\SubUnsur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ButirKegiatan>
 */
class ButirKegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sub_unsur_id' => fake()->randomElement(SubUnsur::query()->pluck('id')->toArray()),
            'nama' => fake()->sentence(),
            'satuan_hasil' => fake()->sentence(),
            'score' => fake()->randomFloat(2, max: 2)
        ];
    }
}
