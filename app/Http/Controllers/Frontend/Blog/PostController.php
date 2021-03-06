<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(4)->onEachSide(1);
        return view('frontend.blog.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        // post view count
        $postKey = 'post_' . $post->id;
        if (!Session::has($postKey)){
            $post->increment('view_count');
            Session::put($postKey, 1);
        }

        // previous-next post links
        $previous = Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();

        // random posts
        $randomPosts = Post::take(8)->inRandomOrder()->get();


        return view('frontend.blog.show', compact('post','previous', 'next', 'randomPosts'));
    }

    // Posts by category
    public function postsByCategory($slug){
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->paginate(4)->onEachSide(1);
        return view('frontend.blog.category.index', compact('posts'));
    }
    // Posts by tag
    public function postsByTag($slug){
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->paginate(4)->onEachSide(1);
        return view('frontend.blog.tag.index',compact('tag','posts'));
    }
}
