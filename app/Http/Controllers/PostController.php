<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post=Post::where('status',2)->lastest('id')->paginate(8);
        return view('posts.index',compact('posts'));
    }
    public function show(Post $post){
        $this->authorize('publisher',$post);
        $similiares= Post::where('category_id',$post->category_id)
                                ->where('status',2)
                                ->where('id','!=',$post->id)
                                ->lastest('id')
                                ->take(4)
                                ->get();

        return view('posts.show', compact('post','similares'));
    }

    public function category(Category $category){
        $posts=Post::where('category_id',$category->id)
                    ->where('status',2)
                    ->lastest('id')
                    ->paginate(6);
                    
        return view('posts.category', compact('posts','category'));
    }
    public function tag(Tag $tag){
       
        $posts= $tag->posts()->where('status',2) ->lastest('id')->paginate(4);

        return view('posts.tag', compact('posts','tag'));
    }
}
