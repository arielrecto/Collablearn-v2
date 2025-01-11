<?php

namespace Database\Seeders;

use App\Models\LearningModule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LearningModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningModule::factory()
            ->count(30)
            ->hasAttachments(5)
            ->create();
    }
}
