<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['admin', 'author']);
        $blogs = Post::paginate(5);
        return view('home', compact('blogs'));
    }
    //public function index(Request $request)
     //{
     // Logic that determines where to send the user
     // if($request->user()->hasRole('author')){
     // return redirect('/author/home');
     // }
     // if($request->user()->hasRole('user')){
     // return redirect('/user.home');
     // }
     // if($request->user()->hasRole('admin')){
     // return view('admin.home');
     // }
       // return view("Hello");
 
}
