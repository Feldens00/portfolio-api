<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    public function getAllPublished(): Collection
    {
        return Post::published()->get();
    }

    public function findById(int $id): ?Post
    {
        return Post::find($id);
    }

    public function getPostsByUser(int $userId): Collection
    {
        return Post::where('user_id', $userId)->get();
    }

    public function searchPosts(string $term): Collection
    {
        return Post::where('title', 'like', '%' . $term . '%')
            ->orWhere('description', 'like', '%' . $term . '%')
            ->published()
            ->get();
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(Post $post, array $data): bool
    {
        return $post->update($data);
    }

    public function delete(Post $post): ?bool
    {
        return $post->delete();
    }
}