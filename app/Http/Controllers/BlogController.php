<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Yajra\Datatables\Datatables;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Post::paginate(5);
         return view('user.blog',compact('blogs'));
        //$posts = Post::where('user_id')->select(['id', 'title', 'cover']);
        //return view('blog.index', 'posts')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $getimageName = uniqid(rand()) . time() . '.' . $request->cover->getClientOriginalExtension();
        $request->cover->move(public_path('cover'), $getimageName);

        Post::create([
            'user_id' => auth()->user()->id,
            'slug' => str_slug($request->title, '-'),
            'title' => $request->title,
            'cover' => 'cover/' . $getimageName,
            'pre_description' => $request->pre_description,
            'description'=> $request->description,
        ]);

        return redirect(route('blog.index'));
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
    public function edit(Request $request, $id)
    {
         $post = Post::findOrFail($id);

         if ($post->user_id != $request->user()->id) {

            return view('blog.edit', compact('post'));
         }

        return abort(403, 'Unauthorized');



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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'pre_description' => 'required',
            'cover' => 'required',
            ]);
    
        $post = Post::findOrFail($id);

        if ($post->user_id != $request->user()->id) {

            return abort(403, 'Unauthorized');
         }

        $post->title = $request->title;
        $post->pre_description = $request->pre_description;
        $post->description= $request->description;

        if ($request->hasFile('cover')) {
            $getimageName = uniqid(rand()) . time() . '.' . $request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('cover'), $getimageName);
            $post->cover = 'cover/' . $getimageName;
            
        } 

        $post->save();  

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id != $request->user()->id) {
            return abort(403, 'Unauthorized');
        }

        $post->delete();

        return redirect()->route('blog.index');
    }
}