<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    public static function generateSlug($title){

        $base_slug = Str::slug($title, '-');
        $slug = $base_slug;
        $relative_post = Post::where('slug', '=', $slug)->first();
        $count = 1;

        while($relative_post){
            $slug = $base_slug . '-' . $count;
            $relative_post = Post::where('slug', '=', $slug)->first();
            $count++;
        }

        return $slug;

    }
}
