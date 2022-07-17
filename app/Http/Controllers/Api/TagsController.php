<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(){
        $tags = Tag::all();

        return response()->json([
            'success' => true,
            'response' => $tags,
        ]);
    }

    public function show($slug){
        $tag = Tag::where('slug', '=', $slug)->with('posts')->first();
        // dd($tag);

        if($tag){
            return response()->json([
                'success' => true,
                'response' => $tag,
            ]);
        }

        return response()->json([
            'success' => false,
            'error' => 'Nessun tag trovato',
        ]);
    }
}
