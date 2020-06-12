<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json(
            [
                'error' => [],
                'status' => true,
                'data' => User::all(),
                'message' => 'Data User',
            ]
        );
    }

    public function getUserResource()
    {
        $user = UserResource::collection(User::all());

        return response()->json(
            [
                'error' => [],
                'status' => true,
                'data' => $user,
                'message' => 'Data User',
            ]
        );
    }

    public function getUserResourceOne()
    {
        $user = new UserResource(User::find(1));

        return response()->json(
            [
                'error' => [],
                'status' => true,
                'data' => $user,
                'message' => 'Data User',
            ]
        );
    }
}
