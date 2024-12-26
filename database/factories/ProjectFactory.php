<?php

namespace Database\Factories;

use App\Models\Guild;
use App\Models\Project;
use App\Models\ProjectParticipant;
use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Guid\Guid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'guild_id' => Guild::factory(),
            'is_public' => $this->faker->boolean(),
            'type' => $this->faker->randomElement(['software', 'hardware', 'research']),
            'max_user' => $this->faker->numberBetween(5, 20),
        ];
    }

    public function withParticipantsAndTasks()
    {
        return $this->afterCreating(function (Project $project) {

            ProjectParticipant::factory()
                ->count($project->max_user)
                ->create(['project_id' => $project->id]);


            ProjectTask::factory()
                ->count(5)
                ->create(['project_id' => $project->id]);
        });
    }
}
