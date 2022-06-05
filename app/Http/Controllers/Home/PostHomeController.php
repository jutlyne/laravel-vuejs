<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class PostHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $post = Post::with('category')->findOrFail($id);
      if (Cookie::get($post->id) =='') {
          Cookie::queue($post->id, '1', 60);
          $post->view_counter = $post->view_counter + 100;
      }
      
      $post->save();

      return view('public.single', compact('post'));
    }
}
