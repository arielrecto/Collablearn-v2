<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Guid\Guid;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lrn',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function myGuilds()
    {
        return $this->hasMany(Guid::class);
    }

    public  function guildPost(){
        return $this->hasMany(GuildPost::class);
    }

    public  function guildPostComments(){
        return $this->hasMany(GuildPostComment::class);
    }
    public function joinedGuilds(){
        return $this->hasMany(GuildMember::class);


    }
    public function projects(){
        return $this->hasMany(Project::class);
    }


    public function assignProjectTasks(){
        return $this->hasMany(ProjectTask::class, 'assign_id');
    }

    public function createdProjectTask(){
        return $this->hasMany(ProjectTask::class, 'created_by');
    }

    public function projectAsParticipants(){
        return $this->hasMany(ProjectParticipant::class);
    }
}
