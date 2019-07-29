<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image'];
    use SoftDeletes;
    public function books(){
        return $this->belongsToMany('App\Book');
    }
}
