<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $categories = Category::all();
        $tags = Tag::all();
        // dd($category);
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getPostValidationRules());
        $post = new Post();
        $data = $request->all();

        if(isset($data['image'])){
            $image_path = Storage::put('img', $data['image']);
            $data['image_path'] = $image_path;
            dd($data);
        }

        // $post->title = $data['title'];
        // $post->content = $data['content'];
        $data['slug'] = Post::generatePostSlug($data['title']);
        // dd($data);
        $post->fill($data);
        
        $post->save();

        if(isset($data['tags'])){
            $post->tags()->sync($data['tags']);
        }
        return redirect()->route('admin.posts.index');
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
        $tags = $post->tags;
        // dd(($tags->isEmpty()));
        return view('admin.posts.show', compact('post', 'tags'));
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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

        if(isset($data['image'])){
            if($post->image_path){
                Storage::delete($post->image_path);
            }

            $image_path = Storage::put('img', $data['image']);
            $data['image_path'] = $image_path;
        }

        // $post->title = $data['title'];
        // $post->content = $data['content'];
        $data['slug'] = Post::generatePostSlug($data['title']);

        $post->update($data);
        $post->save();

        if(isset($data['tags'])){
            $post->tags()->sync($data['tags']);
        }

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
        $post = Post::findOrFail($id);
        $post->tags()->sync([]);

        if($post->image_path){
            Storage::delete($post->image_path);
        }
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    private function getPostValidationRules(){
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:30000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'image' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:10240',
        ];
    }

    
}
