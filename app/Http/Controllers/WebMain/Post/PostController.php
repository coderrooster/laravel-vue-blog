<?php

namespace App\Http\Controllers\WebMain\Post;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Post, Category};
use Illuminate\Support\Str;

class PostController extends Controller
{
  public function store()
  {
    request()->validate([
      'category_id' => 'required|numeric',
      'title' => 'required|min:3',
      'body' => 'required',
    ]);

    $category = Category::findOrFail(request('category_id'));
    $post = Post::create([
      'category_id' => $category->id,
      'title' => request('title'),
      'slug' => Str::slug(request('title')),
      'body' => request('body'),
    ]);
    return response()->json([
      'msg' => 'Your post was created!',
      'post' =>$post,
    ]);
  }

}
