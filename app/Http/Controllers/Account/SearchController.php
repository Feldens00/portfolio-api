<?php

namespace App\Http\Controllers\Account;

use App\Repositories\PostRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Post\SearchRequest;

class SearchController extends Controller
{
    use ValidatesRequests;

    public function __construct(protected readonly PostRepository $postRepository)
    {

    }

    public function __invoke(SearchRequest $request): JsonResponse
    {
        $$validated = $request->validated();
        $term = $validated['term'] ?? '';
        $posts = $this->postRepository->searchPosts($term);

        return response()->json($posts);
    }
}
