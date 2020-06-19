<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guarded = [];
  protected $table='post';
  
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
