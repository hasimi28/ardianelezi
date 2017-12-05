<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryPost;
use Illuminate\Http\Request;
use App\Post;
use App\PostCategory;
use DB;

class CatPostController extends Controller
{
    public function posts($id){

        $cat = PostCategory::where('id','=',$id)->get();
        $posts = Post::where('category_id','=',$id)->paginate(10);

        return view('postwithkat')->withCat($cat)->withPosts($posts);
    }


    public function idpost($id)
    {

        $full_post = Post::where('id', '=', $id)->get();

        foreach ($full_post as $p){
        $next = Post::where('id', '>', $p->id)->first();
        $prev =  Post::where('id', '<', $p->id)->orderBy('id','desc')->first();
        $post_like_this = Post::where('title_sq', 'like', '%' . $p->title_sq . '%')
            ->orWhere('title_de', 'like', '%' . $p->title_de . '%')->take(2)->get();

        return view('fullpost')->withFullpost($full_post)->withNext($next)->withPrev($prev)->withPostlikethis($post_like_this);

        }
    }
}
