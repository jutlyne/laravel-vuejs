<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoriesHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $listPosts = Post::where('category_id', $id)->paginate(3);
      return view('public.category', compact('listPosts'));
    }
}
