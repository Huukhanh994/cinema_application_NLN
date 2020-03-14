<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Film extends Model
{
    protected $table = 'films';

    protected $fillable = [
        'name', 'slug', 'actor', 'producer','author','duration',
        'date_release', 'describe','rated', 'country','language', 'status','brand_id'
    ];

    protected $casts = [
        'brand_id'  => 'integer',
        'category_id'   => 'integer',
        'rate_id'   => 'integer',
        'status'    => 'boolean',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(FilmImage::class);    
    }

    public function attributes()
    {
        return $this->hasMany(FilmAttribute::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_films','film_id','category_id');
    }

    public function rates()
    {
        return $this->belongsToMany(Rate::class,'film_rates','film_id','rate_id');
    }


    public function getBodyHtmlAttribute(){
        return clean($this->bodyHtml());
    }
    
    public function getExcerptAttribute()
    {
        return $this->excerpt(250);
    }

    public function excerpt($length)
    {
        return str_limit(strip_tags($this->bodyHtml()),$length);
    }

    private function bodyHtml()
    {
        return \Parsedown::instance()->text($this->describe);
    }

    public function schedule_film()
    {
        return $this->hasMany(Schedule::class);
    }
}