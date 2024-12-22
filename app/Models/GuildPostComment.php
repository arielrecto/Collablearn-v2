<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuildPostComment extends Model
{
    use HasFactory;


    protected $fillable = [
        'content',
        'user_id',
        'parent_id',
        'guild_post_id'
    ];


    public function guildPost(){
        return $this->belongsTo(GuildPost::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(GuildPostComment::class, 'parent_id');
    }
}
