<?php

namespace Database\Factories;

use App\Models\Unsur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubUnsur>
 */
class SubUnsurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'unsur_id' => fake()->randomElement(Unsur::query()->pluck('id')->toArray()),
            'nama' => fake()->sentence()
        ];
    }
}
