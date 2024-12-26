<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectTask>
 */
class ProjectTaskFactory extends Factory
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
            'id_number' => $this->faker->unique()->numerify('ID###'),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'in-progress', 'completed']),
            'start_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'assign_id' => User::factory(), // Create a related User for the assign_id
            'project_id' => Project::factory(), // Create a related Project for the project_id
            'created_by' => User::factory(), // Cr
        ];
    }
}
