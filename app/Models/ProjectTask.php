<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'id_number',
        'description',
        'status',
        'start_date',
        'due_date',
        'assign_id',
        'project_id',
        'created_by'
    ];


    public function assign(){
        return $this->belongsTo(User::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
