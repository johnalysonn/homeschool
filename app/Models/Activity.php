<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activities';

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    public function discipline(){
        return $this->belongsTo(Discipline::class, 'discipline_id', 'id');
    }
    public function activity_response(){
        return $this->hasMany(Activity_Response::class);
    }
}
