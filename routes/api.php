<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Resources\PostResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/login', [UserController::class, 'loginUser']);
Route::post('/auth/register', [UserController::class, 'createUser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('posts', PostController::class)->except(['create', 'store']);
    Route::post('/posts', [PostController::class, 'store'])->middleware("role:admin");
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categories', CategoryController::class);


Route::get('/tes1', function (Request $request) {
    $article = Article::with('photos')->find(2);
    return $article;
});

Route::get('/tes2', function (Request $request) {
    $photo = Photo::with('article')->find(1);
    return $photo;
});

Route::get('/tes3', function (Request $request) {
    $user = User::with('forums')->find(2);
    return $user;
});

Route::get('/tes4', function (Request $request) {
    // return User::with(['roles', 'roles.permission'])->find(1);


    $user = User::find(1); // Assuming you have a user with ID 1

    $roles = $user->getRoleNames(); // Retrieve the roles assigned to the user
    $permissions = $user->getAllPermissions(); // Retrieve all permissions assigned to the user

    return [
        'roles' => $roles,
        'permissions' => $permissions
    ];
});

Route::get('/tes5', function (Request $request) {
    DB::enableQueryLog();

    $posts = Post::where('title', 'Ab sed id quae fuga.')->where(function ($query) {
        return $query->where('author', 'Evans Pouros')->orWhere('title', 'Adipisci esse ut.');
    })->get();

    //        dd($posts);
    // $posts = Post::with('category')->where('id', 1)->get();
    $query = DB::getQueryLog();

    Log::info($query);

    return PostResource::collection($posts);
});

Route::get('/tes6', function (Request $request) {

    $posts = Post::newest()->get();

    return PostResource::collection($posts);
});

Route::get('/tes7', function (Request $request) {

    $posts = Post::select(['id', 'title'])->get()->prepend(new Post(['title' => "empty"]))->filter(function ($post) {
        return strlen($post->title) < 20;
    })->values();

    return $posts;
});

Route::get('/tes8', function (Request $request) {

    return PostResource::collection(Post::all());
})->middleware(['auth:sanctum', 'permission:create posts']);
