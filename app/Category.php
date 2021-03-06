<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo('App\Category');
    }

    public function children()
    {
        return $this->hasMany('App\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
