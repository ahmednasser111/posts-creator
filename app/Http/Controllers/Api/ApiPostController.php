<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostApiRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource with pagination.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return PostResource::collection($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user');
        return new PostResource($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostApiRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        $post = Post::create($validated);
        $post->load('user');

        return response()->json([
            'message' => 'Post created successfully.',
            'data' => new PostResource($post)
        ], 201);
    }
}
