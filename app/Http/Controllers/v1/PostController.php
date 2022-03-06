<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request, Post $post)
    {
        $params = $request->input();
        $posts = $post
            ->select('posts.id', 'posts.content', 'posts.count', 'posts.url_image', 'posts.created_at', 'users.id AS user_id', 'users.name', 'users.avatar')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id');
        $category_id = $params['category_id'] ?? 0;
        if(!empty($params['category_id'])) {
            $posts->join('category_post', function ($join) use ($category_id) {
                $join->on('posts.id', '=', 'category_post.post_id')
                ->where('category_post.category_id', '=', $category_id);
            })->join('categories', 'categories.id', '=', 'category_post.category_id');
        }
        $posts = $posts->paginate($params['per_page'] ?? 3);
        $posts = PostResource::collection($posts);
        return response()->json($posts, Response::HTTP_OK);
    }

    public function show($id, Post $post, Category $category)
    {
        $post = $post
            ->select('posts.id', 'posts.content', 'posts.count', 'posts.url_image', 'posts.created_at', 'users.id AS user_id', 'users.name', 'users.avatar')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->find($id);
        if (!empty($post)) {
            $post = new PostResource($post);
        }
        
        $categories = $category->select('categories.id', 'categories.title', 'category_post.post_id')
            ->leftJoin('category_post','categories.id', '=', 'category_post.category_id')
                    ->where('category_post.post_id', '=', $id)->get()->toArray();
        $result = [
            'post' => $post,
            'categories' => $categories
        ];
        
        return response()->json($result, Response::HTTP_OK);
    }
}
