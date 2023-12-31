<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        DB::enableQueryLog();

        $posts = Post::when($request->filled('category_id'), function ($query) use ($request) {
            $query->where('category_id', $request->category_id);
        })->with('category')->orderBy('created_at', 'desc')->paginate(10);

        //        dd($posts);
        // $posts = Post::with('category')->where('id', 1)->get();
        $query = DB::getQueryLog();
        // dd($query);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());

        return new PostResource($post);

        // $post = Post::firstOrCreate(['title' => $request->title], $request->all());

        // return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
