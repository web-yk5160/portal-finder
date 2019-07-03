<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class TaskController extends Controller
{
    // public function index(){
    //     $user = User::paginate(2);
    //     // return $user;
    //     return view('home', compact('user'));
    // }

    public function index() {
        $posts = Post::with('tag')->get();
        // return $posts;
        return view('home', compact('posts'));
    }

    public function create() {
        return view('home');
    }

    public function store(Request $request) {
        $title = $request->get('title');
        echo $title;
    }
}
