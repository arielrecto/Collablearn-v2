<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function user(){
        return $this->belongsTo(User::class);
    }
}
