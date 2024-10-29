<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\Post\SearchRequest;


class PostController extends Controller
{
    use ValidatesRequests;

    public function __construct(protected readonly PostRepository $postRepository)
    {

    }

    public function index(): JsonResponse
    {
        $posts = $this->postRepository->getAllFiltered();

        return response()->json($posts);
    }

    public function show($id): JsonResponse
    {
        $post = $this->postRepository->findById($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $post = $this->postRepository->create($data);

        return response()->json($post, 201);
    }

    public function update(UpdateRequest $request, $id): JsonResponse
    {
        $post = $this->postRepository->findById($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $data = $request->validated();
        $this->postRepository->update($post, $data);

        return response()->json($post);
    }

    public function delete($id): JsonResponse
    {
        $post = $this->postRepository->findById($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $this->postRepository->delete($post);

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }

    public function search(SearchRequest $request): JsonResponse
    {
        $$validated = $request->validated();
        $term = $validated['term'] ?? '';
        $posts = $this->postRepository->searchPosts($term);

        return response()->json($posts);
    }
}
