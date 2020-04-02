<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;

class Category extends Model
{
    use NestableTrait;
    
    protected $table = 'categories';

    protected $fillable = [
        'id', 'name' , 'slug', 'description', 'parent_id', 'featured','menu','image'
    ];

    protected $casts = [
        'parent_id' =>  'integer',
        'featured'  =>  'boolean',
        'menu'      =>  'boolean'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name']   = $value;
        $this->attributes['slug']   = str_slug($value);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public function films()
    {
        return $this->belongsToMany(Film::class,'category_films','category_id','film_id');
    }

}
