<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;

class ShowController extends Controller
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

        return response()->json($post);
    }
}
