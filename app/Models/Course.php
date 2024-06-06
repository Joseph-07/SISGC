<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function syst(){
        return $this->belongsTo(Syst::class, 'id_system', 'id');
    }

    public function clas(){
        return $this->belongsTo(Clas::class, 'id_clas', 'id');
    }

    public function proc(){
        return $this->belongsTo(Proc::class, 'id_proc', 'id');
    }

    public function spec(){
        return $this->belongsTo(Speciality::class, 'id_spec', 'id');
    }

    public function personal(){
        return $this->belongsTo(Personal::class, 'id_personal', 'id');
    }

    public function personals(){
        return $this->belongsToMany(Personal::class, 'personal_x_course', 'id_course', 'id_personal')->withPivot('grade', 'approved', 'test_permision');
    }

    public function docs(){
        return $this->belongsToMany(Document::class, 'course_x_document', 'id_course', 'id_document')->withPivot('active');
    }
}
