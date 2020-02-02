<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the forum index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $forums = Forum
            ::with(['category', 'recentPost', 'recentPost.topic', 'recentPost.author'])
            ->orderBy('disp_position')
            ->get();
        $categories = $forums->groupBy('category.cat_name')->sortBy(function ($value, $key) {
            $category = $value->first()->category;
            return "{$category->disp_position}:{$category->id}";
        });

        return view('index', compact('categories'));
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}
