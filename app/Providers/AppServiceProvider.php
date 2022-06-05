<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        // Share du lieu post
        $recentPosts = Post::all()->sortByDesc('created_at')->take(3);
        View::share('recentPosts', $recentPosts);
        // Share popular posts 
        $popularPosts = Post::all()->sortByDesc('view_counter')->take(3);
        View::share('popularPosts', $popularPosts);
        // Share du lieu so luong san pham 
        $listCategories = DB::table("categories")
            ->join("posts", 'posts.category_id', '=', 'categories.id')
            ->select(array('categories.*', DB::raw('COUNT(posts.name) as count')))
            ->groupBy("categories.id")
            ->get();
        View::share('listCategories', $listCategories);
    }
}
