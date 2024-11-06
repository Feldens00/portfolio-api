<?php

namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;
use Carbon\Carbon;

class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post): array
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'description' => $post->description,
            'image' => $post->image,
            'published' => $post->published,
            'published_at' => $post->published_at,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ];
    }
}
