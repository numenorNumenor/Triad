<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogsController extends Controller
{
  public function index() {
    $posts = Post::orderBy('id', 'desc')->paginate(5);

    return view('blog.index')->withPosts($posts);
  }
  public function Post($slug) {
  $post = Post::where('slug', '=', $slug)->first();

  return view('blog.post')->withPost($post);
}
}
