<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_Response extends Model
{
    use HasFactory;
    protected $table = 'activities_responses';

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function activity(){
        return $this->belongsTo(Activity::class);
    }
}
