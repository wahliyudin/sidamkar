<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mente>
 */
class MenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'atasan_langsung_id' => fake()->randomElement(User::query()->whereRoleIs('atasan_langsung')->pluck('id')->toArray()),
            'fungsional_id' => fake()->randomElement(User::query()->whereRoleIs(getAllRoleFungsional())->pluck('id')->toArray())
        ];
    }
}
