<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
    ];

    public static function generatePostSlug($title){

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

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
