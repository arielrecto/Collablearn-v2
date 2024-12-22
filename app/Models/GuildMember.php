<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuildMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'guild_id',
        // 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function guild(){
        return $this->belongsTo(Guild::class);
    }
}
