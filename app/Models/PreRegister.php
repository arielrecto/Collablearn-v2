<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PreRegister extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'first_name',
        'middle_name',
        'lrn',
        'email_token',
        'email_verified_at',
        'photo',
        'step',
        'status'
    ];
}
