<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Film extends Model
{
    protected $table = 'films';

    protected $fillable = [
        'film_name', 'slug', 'actor', 'producer','author','duration',
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

    public function room_use_pivot_schedules()
    {
        return $this->belongsToMany(Room::class,'schedules')
        ->withPivot('id','start_time', 'end_time')
        ->join('clusters','rooms.cluster_id','clusters.cluster_id')
        ->join('cities','clusters.city_id','cities.id')
        ->select('schedules.*','rooms.*','clusters.*','cities.*');
        // từ bảng Film truy cập đến bản Room, and sử dụng bảng Schedules pivot
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
                     ->with([$relation => $constraint]);
    }

}