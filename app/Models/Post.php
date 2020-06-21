<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guarded = [];
  protected $table='post';
  
  //define relation to post table
  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  // --> get row from key, case:slug | define get spesific row by column slug
  // --> but in laravel 7 very simple, just add {post:slug} in param request
  // public function getRouteKeyName()
  // {
  //   return 'slug';
  // }
}
