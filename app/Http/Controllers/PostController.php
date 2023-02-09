<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('category', 'author')->filter(request(['search', 'category']));
        return view('posts', [
            'posts' => $posts->get(),
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }
    public function chartByCategory()
    {
        $data = DB::table('posts')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->selectRaw('count(*) as count,categories.name as category')
            ->groupBy('categories.name')
            ->get();
        $response['data'] = $data;
        return response()->json($response);
    }
}
