<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Post;

class AdminController extends Controller
{
    public function index(){
    	//$role_users = Role::with('users')->where('name', 'admin')->get();
    	//$users = $role_users->users;
    	//dd($users);
        //return view('welcome');
        //$blogs = Post::paginate(5);
    	//return view('admin.author.index', compact('blogs'));
        return "This is index of Authors";
    }
    
}
