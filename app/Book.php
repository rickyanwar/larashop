<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'author', 'publisher',
        'cover', 'price', 'weight', 'stock', 'status'
        ];
    use SoftDeletes;
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
