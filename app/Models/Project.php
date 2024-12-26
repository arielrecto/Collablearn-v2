<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'image',
        'description',
        'user_id',
        'guild_id',
        'is_public',
        'type',
        'max_user'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function guild()
    {
        return $this->belongsTo(Guild::class);
    }
    public function projectTasks()
    {
        return $this->hasMany(ProjectTask::class);
    }


    public function projectParticipants(){
        return $this->hasMany(ProjectParticipant::class);
    }
}
