<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    public function personal(){
        return $this->belongsTo(Personal::class, 'id_personal', 'id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'id_course', 'id');
    }

    public function type_test(){
        return $this->belongsTo(Type_test::class, 'id_type_test', 'id');
    }
}
