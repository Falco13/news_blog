<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        Paginator::useBootstrap();
        $search_is = false;
        $posts = Post::orderBy('created_at', 'desc')->with('user')->paginate(8);
        return view('home', compact('posts', 'search_is'));
    }

    public function search(Request $request) {
        Paginator::useBootstrap();
        $search_is = $request->search;
        if ($search_is !== null && trim($search_is) !== '') {
            $posts = Post::with('user')
                         ->where('title', 'LIKE', "%$search_is%")
                         ->orWhere('description', 'LIKE', "%$search_is%")
                         ->orWhereHas('user', function ($query) use ($search_is) {$query->where('name', 'LIKE', "%$search_is%");})
                         ->orderBy('created_at', 'desc')
                         ->paginate(8);
        } else {
            $posts = Post::query()->whereRaw('false');
        }
        return view('home', compact('posts', 'search_is'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->short_title = Str::length($request->title)>30 ? Str::substr($request->title, 1, 30).'...' : $request->title;
        $post->description = $request->description;
        if($request->file('img')) {
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $post->img = $url;
        }
        $post->author_id = rand(1, 10); // for test
        $post->save();
        return redirect()->route('home')->with('success', 'Your post has been successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $post = Post::find($id);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
