<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class Category extends Model
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
    protected $fillable = ['parent_id', 'slug', 'is_active'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getActive(){
        return $this -> is_active == 0 ? 'غير مفعل' : 'مفعل' ;
    }

    public function _parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function products(){

        return $this->belongsToMany(Product::class,'product_categories');
    }

    public function scopeActive($query){
        return $query -> where('is_active',1) ;
    }

    public function scopeParent($query){
        return $query -> whereNull('parent_id');
    }

   
    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    
}
