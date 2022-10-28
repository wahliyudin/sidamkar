<?php

namespace Database\Factories;

use App\Models\ButirKegiatan;
use App\Models\RencanaSubUnsur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RencanaSubUnsurButirKegiatan>
 */
class RencanaSubUnsurButirKegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rencana_sub_unsur_id' => fake()->randomElement(RencanaSubUnsur::query()->pluck('id')->toArray()),
            'butir_kegiatan_id' => fake()->randomElement(ButirKegiatan::query()->pluck('id')->toArray()),
            'score' => fake()->randomFloat(2, max: 2)
        ];
    }
}
