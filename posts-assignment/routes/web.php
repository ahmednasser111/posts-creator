<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

function getPosts() {
    return session()->get('posts', []);
}

function savePosts($posts) {
    session()->put('posts', $posts);
}

Route::get('/', function () {
    return 'Laravel Assignment Started';
});

Route::get('/posts', function () {
    $posts = getPosts();
    return view('posts.index', compact('posts'));
});

Route::get('/posts/create', function () {
    return view('posts.create');
});

Route::post('/posts', function (Request $request) {
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $posts = getPosts();

    $posts[] = [
        'title' => $request->title,
    ];

    savePosts($posts);

    return redirect('/posts');
});

Route::get('/posts/{id}', function ($id) {
    $posts = getPosts();

    if (!isset($posts[$id])) {
        abort(404);
    }

    $post = $posts[$id];

    return view('posts.show', compact('post', 'id'));
});

Route::get('/posts/{id}/edit', function ($id) {
    $posts = getPosts();

    if (!isset($posts[$id])) {
        abort(404);
    }

    $post = $posts[$id];

    return view('posts.edit', compact('post', 'id'));
});

Route::put('/posts/{id}', function (Request $request, $id) {
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $posts = getPosts();

    if (!isset($posts[$id])) {
        abort(404);
    }

    $posts[$id]['title'] = $request->title;

    savePosts($posts);

    return redirect('/posts');
});

Route::delete('/posts/{id}', function ($id) {
    $posts = getPosts();

    if (!isset($posts[$id])) {
        abort(404);
    }

    unset($posts[$id]);

    // reindex array
    $posts = array_values($posts);

    savePosts($posts);

    return redirect('/posts');
});
