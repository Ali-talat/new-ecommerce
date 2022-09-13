<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    use Translatable ;

    protected $with = ['translations'];


    protected $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['photo','is_active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function getActive(){
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل' ;
    }

    public function getPhotoAttribute($value)
    {
        return $value !== null ? asset('assets/images/brands/'.$value) : '';
    }


}
