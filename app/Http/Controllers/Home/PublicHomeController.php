<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PublicHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPosts = Post::with('category')->orderBy('created_at', 'desc')->paginate(4);
        $listHots = Post::with('category')->orderBy('view_counter', 'desc')->take(3)->get();
        return view('public.index', compact('listPosts', 'listHots'));
    }
}
