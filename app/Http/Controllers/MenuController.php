<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('user.menu', ['post' =>$post]);
    }

    
}
