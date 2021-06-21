<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index(){
        $user_id = Auth::id();
        $posts = Post::where('user_id', $user_id)->get();
        return view('Post.index', compact('posts'));
    }
    //
    /**
     * @throws \Throwable
     */
    public  function  store(Request $request){
        $request->validate([
            'body' => 'required',
            'orderId' => 'required',
        ]);
        $user_id = Auth::id();

        $post = new Post;
        $post->user_id = $user_id;
        $post->orderId = $request->input('orderId');
        $post->body = $request->input('body');

        //if files exist TODO refactor to capture multiple files
        $file = $request->file('file');

        if($file){
            $name = time().rand(1,100).'.'.$file->extension();
            $file->storeAs('files', $name);
            $post->fileName = $name;
            $post->OriginalName = $request->file('file')->getClientOriginalName();
        }
        $post->saveOrFail();
        return redirect()->route('show_message', ['id' => $post->id])->with('status', 'Message Created and Sent Successfully');
    }

    public function show($id){
        //Todo Limit to the user logged in(Auth::id())
        $post = Post::find($id);
        return view('Post.show', compact('post'));
    }
}
