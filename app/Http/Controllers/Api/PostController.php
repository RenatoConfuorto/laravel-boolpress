<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        // dd($request->all());
        $items_per_page = $request->itemsPerPage ? $request->itemsPerPage : 6;
        // dd($items_per_page);
        $posts = Post::paginate($items_per_page);
        return response()->json([
            'success' => true,
            'response' => $posts,
        ]);
    }
}
