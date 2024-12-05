<?php

namespace App\Http\Controllers\Post;

use App\Repositories\PostRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

class DeleteController extends Controller
{

    public function __construct(protected readonly PostRepository $postRepository)
    {

    }

    public function __invoke($id): JsonResponse
    {
        $post = $this->postRepository->findById($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $this->postRepository->delete($post);

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
