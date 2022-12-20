<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $table = 'disciplines';

    public function activities(){
        $this->hasMany(Activity::class, 'discipline_id', 'id');
    }
    
}
