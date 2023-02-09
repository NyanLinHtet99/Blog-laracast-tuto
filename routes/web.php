<?php

use App\Charts\AuthorsChart;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name("home");
// Route::get('/test', function () {
//     $post = Post::find(1);
//     return $post->category->name;
//     return view('test',[
//         'post' => $post,
//     ]);
// });
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/categories/{category:slug}', function (Category $category) {
    $posts = $category->posts->load(['category', 'author']);

    return view('posts', [
        'posts' => $posts,
    ]);
});
Route::get('/authors/{author:username}', function (User $author) {
    $posts = $author->posts->load(['category', 'author']);
    return view('posts', [
        'posts' => $posts,
        'categories' => Category::all(),
    ]);
});
Route::get('/Getchart', [PostController::class, 'chartByCategory']);
Route::get('/chart', function () {
    return view('charts');
});
// Route::get('/store', function(){
//     $post = new Post();
//     $post->title = 'Personal Post';
//     $post->slug = 'first-post';
//     $post->body = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ex sunt veniam repellat earum illo explicabo id
//     inventore, officia eius itaque, nostrum optio. Accusantium, minus dolorum quisquam quo voluptatum doloribus!';
//     $post->excerpt = 'personal post from me';
//     $post->category_id = 1;
//     $post->save();
//     $post = new Post();
//     $post->title = 'Work Post';
//     $post->slug = 'second-post';
//     $post->body = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ex sunt veniam repellat earum illo explicabo id
//     inventore, officia eius itaque, nostrum optio. Accusantium, minus dolorum quisquam quo voluptatum doloribus!';
//     $post->excerpt = 'work post from me';
//     $post->category_id = 2;
//     $post->save();
//     $post = new Post();
//     $post->title = 'Hobbies Post';
//     $post->slug = 'third-post';
//     $post->body = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ex sunt veniam repellat earum illo explicabo id
//     inventore, officia eius itaque, nostrum optio. Accusantium, minus dolorum quisquam quo voluptatum doloribus!';
//     $post->excerpt = 'Hobby post from me';
//     $post->category_id = 3;
//     $post->save();
//     $category = new Category();
//     $category->name = 'Personal';
//     $category->slug = 'personal';
//     $category->save();
//     $category = new Category();
//     $category->name = 'Work';
//     $category->slug = 'work';
//     $category->save();
//     $category = new Category();
//     $category->name = 'Hobbies';
//     $category->slug = 'hobbies';
//     $category->save();

//     return redirect('/');
// });