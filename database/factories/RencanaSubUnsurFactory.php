<?php

namespace Database\Factories;

use App\Models\Rencana;
use App\Models\SubUnsur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RencanaSubUnsur>
 */
class RencanaSubUnsurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rencana_id' => fake()->randomElement(Rencana::query()->pluck('id')->toArray()),
            'sub_unsur_id' => fake()->randomElement(SubUnsur::query()->pluck('id')->toArray())
        ];
    }
}
