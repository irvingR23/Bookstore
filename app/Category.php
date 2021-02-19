<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $fillable = [
      'name', 'slug'
    ];


    //Un libro tiene muchas categorias M:1
    public function books(){
      return $this->hasMany(Book::class);
    }
}
