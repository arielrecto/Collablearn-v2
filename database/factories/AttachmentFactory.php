<?php

namespace Database\Factories;

use App\Models\LearningModule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'learning_module_id' => LearningModule::factory(), // Foreign key for `LearningModule`
            'file' => $this->faker->filePath(), // Random file path
        ];
    }
}
