<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected function casts(): array{
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean'
        ];
    }

    protected function title(): Attribute{
        return Attribute::make(
            set: function($value){
                 return strtolower($value);
            },
            get: function($value){
                return ucfirst($value);
            }
        );
    }
}
