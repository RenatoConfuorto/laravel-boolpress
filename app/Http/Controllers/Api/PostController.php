<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Dotenv\Result\Success;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        // dd($request->all());
        $items_per_page = $request->itemsPerPage ? $request->itemsPerPage : 6;
        // dd($items_per_page);
        $posts = Post::with(['category'])->paginate($items_per_page);
        // dd($posts[0]->category);

        foreach ($posts as $post) {
            if($post->image_path){
                $post->image_path = url('storage/' . $post->image_path);
            }
        }
        return response()->json([
            'success' => true,
            'response' => $posts,
        ]);
    }

    public function show($slug){
        $post = Post::where('slug', '=', $slug)->with(['category', 'tags'])->first();
        // dd($post->category);
        if($post->image_path){
            $post->image_path = url('storage/' . $post->image_path);
        }
        
        if($post){

            return response()->json([
                'success' => true,
                'response' => $post,
                
            ]);
        }

        return response()->json([

            'success' => false,
            'error' => 'Nessun post trovato',
        ]);
    }
}
