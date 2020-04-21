<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    protected $table = 'category_foods';

    protected $fillable = ['cof_id','cof_name'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
