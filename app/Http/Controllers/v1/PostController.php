<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index(Request $request, Post $post)
    {
        $posts = $post
            ->select('posts.id', 'posts.content', 'posts.count', 'posts.url_image', 'posts.created_at', 'users.id AS user_id', 'users.name', 'users.avatar')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id');
        $category_id = $request->category_id ?? 0;
        if(!empty($request->category_id)) {
            $posts->join('category_post', function ($join) use ($category_id) {
                $join->on('posts.id', '=', 'category_post.post_id')
                ->where('category_post.category_id', '=', $category_id);
            })->join('categories', 'categories.id', '=', 'category_post.category_id');
        }
        if (!empty($request->user_id)) {
            $posts->where('posts.user_id', $request->user_id);
        }
        if (!empty($request->content)) {
            $posts = $posts->where('posts.content', 'LIKE', "%{$request->content}%");
        }
        $posts = $posts->orderBy('id', 'DESC')->paginate($request->per_page ?? 3);
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

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'content' => ['required']
            ]);

            $data = $request->except(['url_image']);
            if ($request->url_image) {
                $url_image = $request->file('url_image');
                $filename = uniqid() .  '.' .  $url_image->getClientOriginalExtension();
                Image::make($url_image)->resize(300, 300)->save(public_path('storage/images/posts/' . $filename));
                $data['url_image'] = $filename;
            }
            $data['user_id'] = auth()->user()->id;
            $post = Post::create($data);
            $post->categories()->attach($request->categories ?? []);
            DB::commit();
            return response()->json([
                'status' => 'Updated successfully!',
                'post' => new PostResource($post)
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 400);
        }
    }
}
