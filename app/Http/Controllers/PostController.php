<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function users(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $response = Post::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $response
        ], 200);
    }

    function usersList(): \Illuminate\Database\Eloquent\Collection
    {
        return Post::all();
    }
}
