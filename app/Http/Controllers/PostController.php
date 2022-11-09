<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function homepage()
    {
        //return Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'categories.title as category_title', 'users.name as user_name')->take(4)->get();
        return Inertia::render('Home', [
            'posts'=>Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'categories.title as category_title', 'users.name as user_name', 'users.profile_photo_path as user_avatar')->take(4)->get(),
            
        ]);
    }
    
    
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts'=>Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->join('users', 'posts.user_id', '=', 'users.id')->paginate(6, array('posts.*', 'categories.title as category_title', 'users.name as user_name'))
          ]);
    }


    public function indexCategory($id)
    {
        return Inertia::render('Posts/Index', [
            'posts'=>Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->join('users', 'posts.user_id', '=', 'users.id')->where('categories.id', '=', $id)->paginate(6, array('posts.*', 'categories.title as category_title', 'users.name as user_name'))
          ]);
    }


    public function indexAuthor($id)
    {
        return Inertia::render('Posts/Index', [
            'posts'=>Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->join('users', 'posts.user_id', '=', 'users.id')->where('users.id', '=', $id)->paginate(6, array('posts.*', 'categories.title as category_title', 'users.name as user_name'))
          ]);
    }

    public function indexPostsList()
    {
        
        $userIdLoged = Auth::user()->id;
        return Inertia::render('Posts/IndexPosts', [
            'posts'=>Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->join('users', 'posts.user_id', '=', 'users.id')->where('posts.user_id', '=', $userIdLoged)->select('posts.*', 'categories.title as category_title', 'users.name as user_name')->get()
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('images', 'public');
        } else {
            $image = null;
        }
    

        Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::user()->id,
            'image'=>$image,
        ]);

        return redirect('dashboard/postsList')->with('message', 'Post created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return Inertia::render('Posts/Show', [
            'post'=>Post::latest()->join('categories', 'posts.category_id', '=', 'categories.id')->join('users', 'posts.user_id', '=', 'users.id')->where('posts.id', '=', $id)->select('posts.*', 'categories.title as category_title', 'users.name as user_name', 'users.profile_photo_path as user_avatar')->get()
        ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($post->user_id != Auth::user()->id){
            abort(403, 'Unauthorized Action');
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            
        ]);

        if($request->hasFile('image')){
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->save();
    
        return redirect('/dashboard/postsList')->with('message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('message', 'Post delete successfully!');
    }
}
