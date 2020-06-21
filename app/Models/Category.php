<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public function posts()
    {
        //return $this->hasMany(Post::class,'category_id');
        return $this->hasMany(Post::class); //by default use primary key
    }
}
