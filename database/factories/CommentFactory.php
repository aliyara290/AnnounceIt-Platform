<?php

namespace Database\Factories;

use App\Models\Announcements;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->realText(),
            'user_id' => User::all()->random()->id,
            'announce_id' => Announcements::all()->random()->id
        ];
    }
}
