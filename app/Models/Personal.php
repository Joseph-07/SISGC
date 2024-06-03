<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Personal extends Model
{
    use HasFactory;
    
    public function courses(){
        return $this->hasMany(Course::class, 'id_personal' ,'id');
    }

    public function courseses(){
        return $this->belongsToMany(Course::class, 'personal_x_course', 'id_personal', 'id_course');
    }
    
}
