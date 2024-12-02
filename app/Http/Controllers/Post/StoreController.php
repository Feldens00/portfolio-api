<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends Controller
{

    use ValidatesRequests;

    public function __construct(protected readonly PostRepository $postRepository)
    {

    }

    public function __invoke(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $post = $this->postRepository->create($data);

        return response()->json($post, 201);
    }
}
