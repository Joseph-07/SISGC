<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syst extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->hasMany(Course::class, 'id_system' ,'id');
    }

    public function procs(){
        return $this->hasMany(Proc::class, 'id_system' ,'id');
    }
}
