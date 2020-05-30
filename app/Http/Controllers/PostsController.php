<?php

namespace BestBlog\Http\Controllers;

use Illuminate\Http\Request;
use BestBlog\Post;
class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //index page
    public function index(){
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        $count = Post::count();
        return view('posts.index', compact('posts', 'count'));
    }

    //show page
    public function show($id){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    //create post
    public function create(){
        return view('posts.create');
    }

    //store post

    public function store(Request $request){

        $request->validate([
            'title' => 'required|max:200',
            'body' => 'required|max:500',
            'coverImage' => 'image|mimes:jpeg,bmp,png|max:1999'
        ]);

        if ($request->hasFile('coverImage')){
            $file = $request->file('coverImage');
            $ext = $file->getClientOriginalExtension();
            $filename = 'cover_image' . '_' . time() . '.' . $ext;
            $file->storeAs('public/coverImages' , $filename);
        } else {
            $filename = 'noimage.png';
        }

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $filename;
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts')->with('status', 'Post was created !');

    }

    // edit form post
    public function edit($id){
        $post = Post::find($id);
        if( auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'You are not authorized');
        }
        return view('posts.edit', compact('post'));
    }

    // update form post
    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|max:200',
            'body' => 'required|max:500',
            'coverImage' => 'image|mimes:jpeg,bmp,png|max:1999'
        ]);

        if ($request->hasFile('coverImage')){
            $file = $request->file('coverImage');
            $ext = $file->getClientOriginalExtension();
            $filename = 'cover_image' . '_' . time() . '.' . $ext;
            $file->storeAs('public/coverImages' , $filename);

        } else {
            $filename = 'noimage.png';
        }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $filename;
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts')->with('status', 'Post was updated !');







        // $request->validate([
        //     'title'=> 'required|max:200',
        //     'body'=> 'required|max:500',
        //     'coverImage' => 'image|mimes:jpeg,bmp,png|max:1999'
        // ]);
        // $post = Post::find($id) ;
        // $post->title = $request->title;
        // $post->body = $request->body;



        // //$post->image = $request->coverImage;

        // $post->save();
        // return redirect('/posts')->with('status', 'Post was Updated !');
    }

    //destroy post
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('status', 'Post was Deleted !');

    }
}
