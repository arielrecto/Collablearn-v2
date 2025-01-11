<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\LearningModule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningModule>
 */
class LearningModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'posted_by' => User::where('name','admin')->first()->id,
        ];
    }

    public function hasAttachments(int $count = 1)
    {
        return $this->afterCreating(function (LearningModule $learningModule) use ($count) {
            \App\Models\Attachment::factory($count)->create([
                'learning_module_id' => $learningModule->id,
            ]);
        });
    }
}
