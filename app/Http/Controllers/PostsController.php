<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use Session;

class PostsController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->paginate(5);

      return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::pluck('category_name','id');

      if (count($categories) <= 0) {
        Session::flash('danger', 'There have not been any category created yet. Firstly create category then post.');
      }

      return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'title'       => 'required|max:255|unique:posts',
        'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        'category_id' => 'required|integer',
        'body'        => 'required'
      ]);

      $post = new Post;

      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = $request->body;
      $post->user_id = Auth::user()->id;

      $post->save();

      Session::flash('success', 'post was successfully created !');

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);

      return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);

      if ( $post->user_id !== Auth::user()->id )

      {
        Session::flash('danger', 'you are not authorized to edit this post !');

        return redirect()->route('posts.index');
      }

      if ($post->category_id == null) {

        Session::flash('danger', 'This post does not have any category yet, please choose one !');

      }

      $categories = Category::pluck('category_name', 'id');

      return view('posts.edit')->withPost($post)->withCategories($categories);
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
      $this->validate($request,[
        'title'       => 'required|max:255',
        'slug'        => 'required|alpha_dash|min:5|max:255',
        'category_id' => 'required|integer',
        'body'        => 'required'
      ]);

      $post = Post::find($id);

      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = $request->body;

      $post->save();

      Session::flash('success', 'post was successfully updated !');

      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);

      if ( $post->user_id !== Auth::user()->id )

      {
        Session::flash('danger', 'you are not authorized to edit this post !');

        return redirect()->route('posts.index');
      }

      $post->delete();

      Session::flash('success', 'post was successfully deleted !');

      return redirect()->route('posts.index');
    }
}
