<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuildPost extends Model
{
    use HasFactory;


    protected $fillable = [
        'content',
        'user_id',
        'guild_id',
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }

    public  function guild(){
        return $this->belongsTo(Guild::class);
    }

    public function comments(){
        return $this->hasMany(GuildPostComment::class);
    }
}
