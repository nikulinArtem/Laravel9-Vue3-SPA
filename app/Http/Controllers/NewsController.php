<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function list(int $count = 5): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NewsResource::collection(News::orderBy('created_at', 'desc')->limit($count)->get());
    }
    function home(int $count = 3): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NewsResource::collection(News::orderBy('created_at', 'desc')->limit($count)->get());
    }
}
