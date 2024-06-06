<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    use HasFactory;
    protected $table = 'term_glosary';

    public function proc(){
        return $this->belongsTo(Proc::class, 'id_proc', 'id');
    }
}
