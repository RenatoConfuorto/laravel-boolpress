<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_list = Post::all();
        // dd($post_list);
        return view('admin.posts.index', compact('post_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getPostValidationRules());
        $data = $request->all();

        $post = Post::findOrFail($id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->slug = $this->generatePostSlug($post->title);

        $post->save();

        return redirect()->route('admin.posts.show', ['post' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPostValidationRules(){
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:30000'
        ];
    }

    public function generatePostSlug($title){

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
