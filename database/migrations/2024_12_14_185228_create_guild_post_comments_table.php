<?php

use App\Models\GuildPost;
use App\Models\GuildPostComment;
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
        Schema::create('guild_post_comments', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(GuildPost::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(GuildPostComment::class, 'parent_id')->nullable()->constrained('guild_post_comments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guild_post_comments');
    }
};
