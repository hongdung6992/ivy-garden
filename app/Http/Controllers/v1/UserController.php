<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function show($id, User $user)
    {
        $user = $user
            ->select('users.id', 'users.name', 'users.avatar')
            ->find($id);
       
        if (!empty($user)) {
            $user = new UserResource($user);
        }
        return response()->json($user, Response::HTTP_OK);
    }

}
