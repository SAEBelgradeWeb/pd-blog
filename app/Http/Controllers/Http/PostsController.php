<?php

namespace App\Http\Controllers\Http;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user', 'category', 'tags'])->orderBy('created_at', 'DESC')->get();
        return view('posts-index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkLogin();
        $categories = Category::all()->pluck('title', 'id');
        $tags = Tag::all()->pluck('title', 'id');
        return view('posts-create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkLogin();

        $path = ($request->file('post_image')) ? $request->file('post_image')->store('public/images') : "";

        $request->merge(['user_id' => \Auth::user()->id, 'image' => substr($path, 7)]);

        $post = Post::create($request->all());
        $post->tags()->attach($request->tags);


        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->with(['category', 'user', 'tags'])->first();
        return view('posts-show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkLogin();
        
        Post::destroy($id);
        return redirect('/posts');
    }

    private function checkLogin() {
        if(!Auth::check()) {
            return redirect('/login');
        }
    }

}
