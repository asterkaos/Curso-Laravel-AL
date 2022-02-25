<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','show');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }
    public function index()
    {
        $post= Post::all();
        return view('admin.post.index', compact('post'));
    }

    
    public function create()
    {
        
        $categories= Category::plug('name','id');
        $tags=Tag::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        /* return Storage::put('posts',$request->file('file')); */
         
        $post=Post::create($request->all());

        if($request->file('file')){
            $url=Storage::put('posts',$request->file('file'));

            $post->image()->create([
                'url'=>$url,

            ]);
        }
        if($request->tags){
            $post->tag()->attach([$request->tags]);
        }

        return redirect()->route('admin.posts.edit', $post); 
    }

    

    public function edit(Post $post)
    {
        $this->authorize('author',$post);

        $categories= Category::plug('name','id');
        $tags=Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

   
    public function update(Request $request, Post $post)
    {

        $this->authorize('author',$post);
        $post->update($request->all());
        if($request->file('file')){
            $url=Storage::put('posts',$request->file('file'));
            if($post->image){
                Storage::delete($post->image->url);
                $post->image->upadte([
                    'url'=>$url
                ]);
            }else{
                $post->image()->create([
                    'url'=>$url
                ]);
            }
        }
        if($request->tags){
            $post->tag()->sync([$request->tags]);
        }   

        return redirect()->route('admin.posts.edit', $post)->with('info','el post se actualizo con exito');
    }

    
    public function destroy(Post $post)
    {
        $this->authorize('author',$post);
        $post->delete();
        return redirect()->route('admin.posts.index', $post)->with('info','el post se elimino con exito');

    }
}
