<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use Mews\Purifier\Facades\Purifier;

class AdminPost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $post = Post::all();

            return view('backend.pages.view_post')->withPosts($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postcategory = PostCategory::all();
        return view('backend.pages.create_post')->withPostcategory($postcategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_sq' => 'required',
            'title_de' => 'required',
            'desc_sq' => 'required',
            'desc_de' => 'required',

        ]);

        $post = new Post;

        $post->title_sq = $request->title_sq;
        $post->title_de = $request->title_de;
        $post->desc_sq = Purifier::clean($request->desc_sq);
        $post->desc_de = Purifier::clean($request->desc_de);
        $post->category_id = $request->category_id;

        $post->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
