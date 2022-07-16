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
}
