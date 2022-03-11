<?php

namespace App\Http\Controllers\v1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function show($id, User $user)
    {
        $user = $user
            ->select('users.id', 'users.name', 'users.avatar', 'users.email', 'users.gender')
            ->find($id);
       
        if (!empty($user)) {
            $user = new UserResource($user);
        }
        return response()->json($user, Response::HTTP_OK);
    }

    public function updateMyProfile(Request $request)
    {
        
        DB::beginTransaction();
        try {
        $request->validate([
            'name' => ['required']
        ]);
        $user = User::findOrFail(auth()->user()->id);
        if ($user->avatar && $request->avatar) {
            File::delete(public_path('storage/images/avatar/' . $user->avatar));
        }
        $data = $request->except(['avatar']);
        if ($request->avatar) {
            $avatar = $request->file('avatar');
            $filename = uniqid() .  '.' .  $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('storage/images/avatar/' . $filename));
            $data['avatar'] = $filename;
        }
        $user->update($data);
        DB::commit();
        return response()->json([
            'status' => 'Updated successfully!',
            'user' => new UserResource($user)
        ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 400);
        }
    }

}
