<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    public static function generateSlug($title){

        $base_slug = Str::slug($title, '-');
        $slug = $base_slug;
        $relative_category = Category::where('slug', '=', $slug)->first();
        $count = 1;

        while($relative_category){
            $slug = $base_slug . '-' . $count;
            $relative_category = Category::where('slug', '=', $slug)->first();
            $count++;
        }

        return $slug;

    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
