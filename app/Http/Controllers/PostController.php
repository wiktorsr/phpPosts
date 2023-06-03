<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post($request->all());

        $post->slug = Str::slug($request->title);

        $ext = $request->file('thumbnail')->extension();
        $fileName = hash('sha256', time()).'.'.$ext;
        $request->file('thumbnail')->move(public_path('uploads/'), $fileName);
        $post->thumbnail = $fileName;

        $post->save();
        return redirect(route('admin_posts_index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $imagePath = asset('uploads/'.$post->thumbnail);
        return view('admin.posts.edit', compact('post', 'imagePath'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(file_exists(public_path('uploads/'.$post->thumbnail))){
            unlink(public_path('uploads/'.$post->thumbnail));
        }
        $post->delete();
        return redirect(route('admin_posts_index'));
    }
}
