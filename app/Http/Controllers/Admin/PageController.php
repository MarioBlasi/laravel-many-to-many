<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PageController extends Controller


{
    public function index(){
        $postList = post::all();
        return view('home', compact('postList'));
        // return view('admin.dashboard');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
}

