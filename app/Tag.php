<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Tag extends Model
{
    public static function generateSlug($title){

        $base_slug = Str::slug($title, '-');
        $slug = $base_slug;
        $relative_tag = Tag::where('slug', '=', $slug)->first();
        $count = 1;

        while($relative_tag){
            $slug = $base_slug . '-' . $count;
            $relative_tag = Tag::where('slug', '=', $slug)->first();
            $count++;
        }

        return $slug;

    }

}
