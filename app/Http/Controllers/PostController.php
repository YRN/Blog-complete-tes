<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Tag;
use App\Category;
use Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with('post',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count()==0 || $tags->count() == 0){
            Session::flash('info','You must have some categories and tags before attempting to create a post');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories',Category::all())
                                         ->with('tags',Tag::all());
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
        //
        //dd($request->all());
        $this->validate($request,[
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' =>'required'
            
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'image_name' => $featured_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);


        //dd($request->all());

        Session::flash('success','You succesfully created a Post');

        return redirect()->route('post.create');
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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())
                                        ->with('tags',Tag::all());
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
        $post= Post::find($id);

        $this->validate($request,[
            'title' =>'required',
            'content' =>'required',
            'category_id' =>'required',
            'tags' =>'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')){

            
                //dd($post->featured);
            File::delete('uploads/posts/'.$post->image_name);
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured =  'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','You succesfully edit a post');

        return redirect()->route('post');
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
        $post = Post::find($id);

        $post->delete();

        Session::flash('success','You succesfully trashed a post');

        return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        //dd($posts);

        return view('admin.posts.trash')->with('post',$posts);
    }

    public function kill($id){
        $posts = Post::withTrashed()->where('id',$id)->first();

        $posts->forceDelete();
        //dd($posts);

        Session::flash('success','You succesfully deleted a Post Permanently');
        return redirect()->back();
    }
    
    public function restore($id){
        $posts = Post::withTrashed()->where('id',$id)->first();

        $posts->restore();
        //dd($posts);

        Session::flash('success','You succesfully restored a Post Permanently');
        return redirect()->route('post');
    }
}