<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proc extends Model
{
    use HasFactory;

    public function syst()
    {
        return $this->belongsTo(Syst::class, 'id_system', 'id');
    }
    
    public function courses(){
        return $this->hasMany(Course::class, 'id_proc' ,'id');
    }
}
