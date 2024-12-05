<?php

namespace App\Http\Controllers\Post;

use App\Repositories\PostRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends Controller
{
    use ValidatesRequests;

    public function __construct(protected readonly PostRepository $postRepository)
    {

    }

    public function __invoke(UpdateRequest $request, $id): JsonResponse
    {
        $post = $this->postRepository->findById($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $data = $request->validated();
        $this->postRepository->update($post, $data);

        return response()->json($post);
    }
}
