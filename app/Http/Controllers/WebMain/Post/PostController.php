<?php

namespace App\Http\Controllers\WebMain\Post;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\{Post, Category};
use Illuminate\Support\Str;

class PostController extends Controller
{
  //view list post
  public function index()
  {
    $post=Post::with('category')->latest()->get();
    return PostResource::collection($post);
  }

  //show detail per row
  //public function show(Category $category, Post $post) //with category, ex. api/post/ctg-slug/post-slug
  public function show(Category $category, Post $post)
  {
    //return new PostResource($post);
    return PostResource::make($post); //also like this
  }

  // store data to db
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
