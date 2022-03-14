<?php

namespace App\Http\Controllers\v1;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function getCommentsByPostId(Request $request, Comment $comment)
    {
        $comments = $comment
        ->select('comments.id', 'comments.comment', 'comments.created_at', 'comments.post_id', 'comments.user_id', 'users.name', 'users.avatar')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->where('comments.post_id', $request->post_id ?? 0)
        ->orderBy('id', 'ASC')
        ->get();
        $comments = CommentResource::collection($comments);
        return response()->json($comments, Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $data = array_merge(['user_id' => auth()->user()->id], $request->all());
        $comment = Comment::create($data);
        return response()->json([
            'status' => 'Updated successfully!',
            'comment' => new CommentResource($comment)
        ], 200);
    }
}
