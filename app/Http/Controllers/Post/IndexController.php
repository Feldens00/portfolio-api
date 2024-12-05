<?php

namespace App\Http\Controllers\Post;

use App\Repositories\PostRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Post\FilterRequest;


class IndexController extends Controller
{
    use ValidatesRequests;

    public function __construct(protected readonly PostRepository $postRepository)
    {

    }

    public function __invoke(FilterRequest $request): JsonResponse
    {
        $filters = $request->validated();
        $posts = $this->postRepository->getAllFiltered($filters);

        return response()->json($posts);
    }
}
