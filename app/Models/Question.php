<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Question extends Model
{
    use HasFactory;
    public function getImageUrlAttribute(): string{
        return Storage::disk('images')->url($this->image);
    }

    public function type_quest(){
        return $this->belongsTo(Type_quest::class, 'id_type_question', 'id');
    }
    
    public function answers(){
        return $this->hasMany(Answer::class, 'id_question', 'id');
    }
}
