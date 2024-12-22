<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guild extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'description',
        'is_public',
        'max_users',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public  function guildPosts()
    {
        return $this->hasMany(GuildPost::class);
    }
    public function guildMembers()
    {
        return $this->hasMany(GuildMember::class);
    }

    public function isAuthUserGuildMember()
    {
        return $this->guildMembers()->where('user_id', Auth::user()->id)->exists();
    }
    public function leaveUserGuild()
    {
        return $this->guildMembers()->where('user_id', Auth::user()->id)->first()->delete();

    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
}
