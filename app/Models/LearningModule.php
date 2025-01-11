<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningModule extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'posted_by',
    ];



    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
