<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $with = ['translations'];


    protected $translatedAttributes = ['name','description','short_description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id',
        'slug',
        'sku',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'manage_stock',
        'qty',
        'in_stock',
        'is_active',
        'viewed'
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'in_stock' => 'boolean',
        'manage_stock' => 'boolean',

    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];

    public function brands(){

        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function categories(){

        return $this->belongsToMany(Category::class,'product_categories');
    }

    public function wishlist(){

        return $this->belongsToMany(User::class,'wishlists');
    }

    public function tags(){

        return $this->belongsToMany(Tag::class,'product_tags');
    }

    public function getActive(){
        return $this-> is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    
     
    public function options()
    {
        return $this->hasMany(Option::class, 'product_id');
    }

    public function scopeActive($query){
        return $query -> where('is_active',1) ;
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    

    
}
