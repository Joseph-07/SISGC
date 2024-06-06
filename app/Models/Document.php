<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_x_document', 'id_document', 'id_course');
    }

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

    public function category(){
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function typeDoc(){
        return $this->belongsTo(Type_doc::class, 'id_type_doc', 'id');
    }
}
