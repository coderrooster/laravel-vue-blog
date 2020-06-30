<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    //return parent::toArray($request);
    return [
      'id' => $this->id,
      'title' => $this->title,
      'categoryId' => $this->category->id,
      'category' => $this->category->name,
      'slug' => $this->slug,
      'body' => $this->body,
      'publishedForHuman' => $this->created_at->diffForHumans(), //ex. 1 day ago
      'published' => $this->created_at->format('d F, Y'), //ex. 9 June, 2020
      //'url' => route('post.show', [$this->category, $this->slug]), //with category, ex. api/post/ctg-slug/post-slug => give to controller post.show
      'url' => route('post.show', [$this->slug]),
    ];
  }
}
