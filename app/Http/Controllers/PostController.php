<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;

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

    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'image' => 'nullable|string',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->only([
            'title', 'image', 'description', 'content', 'user_id', 'published', 'published_at'
        ]);
       
        $post = $this->postRepository->create($data);

        return response()->json($post, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $post = $this->postRepository->findById($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $this->validate($request, [
            'title' => 'sometimes|required|string|max:255',
            'image' => 'nullable|string',
            'description' => 'sometimes|required|string',
            'content' => 'nullable|string',
            'published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->only([
            'title', 'image', 'description', 'content', 'published', 'published_at'
        ]);

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

    public function search(Request $request): JsonResponse
    {
        $term = $request->get('term', '');
        $posts = $this->postRepository->searchPosts($term);

        return response()->json($posts);
    }
}
