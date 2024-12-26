<?php

use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_number')->nullable();
            $table->longText('description');
            $table->string('status')->default(TaskStatus::PENDING->value);
            $table->string('start_date');
            $table->string('due_date');
            $table->foreignIdFor(User::class, 'assign_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'created_by')->constrained('users')->onDelete('cascade');
            $table->foreignIdFor(Project::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_tasks');
    }
};
