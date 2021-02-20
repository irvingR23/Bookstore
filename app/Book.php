<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
  protected $fillable = [
      'user_id','category_id',
      'name','description',
      'ISBN', 'author', 'editorial', 'status'
  ];

  //Una categoria le pertenece a un libro 1:M
  public function category(){
    return $this->belongsTo(Category::class);
  }

  //Los libros le pertenecen a un usuario 1:M
  public function user(){
    return $this->belongsTo(User::class);
  }
}