<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Homework;
use App\Models\HomeworkFile;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.Messages.index', compact('posts'));
    }

    public function show($id){
        //Todo Limit to the user logged in(Auth::id())
        $post = Post::find($id);
        return view('admin.Messages.show', compact('post'));
    }
}
