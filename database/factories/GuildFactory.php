<?php

namespace Database\Factories;

use App\Models\Guild;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guild>
 */
class GuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'is_public' => $this->faker->boolean(),
            'max_users' => $this->faker->numberBetween(5, 20),
            'user_id' => User::factory(),
        ];
    }

    public function withMembers()
    {
        return $this->afterCreating(function (Guild $guild) {
            $users = User::inRandomOrder()->take($guild->max_users)->get();

            foreach ($users as $user) {
                $guild->guildMembers()->create([
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
