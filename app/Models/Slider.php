<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['photo'] ;

    public function getPhotoAttribute($value)
    {
        return $value !== null ? asset('assets/images/sliders/'.$value) : '';
    }
}
