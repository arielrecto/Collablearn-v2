<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;


    protected $fillable = [
        'file',
        'name',
        'size',
        'learning_module_id',
    ];



    public  function learningModule()
    {
        return $this->belongsTo(LearningModule::class);
    }

    public  function formattedSize()
    {


        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        for ($i = 0; $this->size >= 1024 && $i < count($units) - 1; $i++) {
            $this->size /= 1024;
        }
        return round($this->size, 2) . ' ' . $units[$i];
    }
}
