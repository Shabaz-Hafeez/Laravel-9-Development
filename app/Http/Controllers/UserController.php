<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('post');
    }

    // public function test()
    // {
    //     return view('test');
    // }
    
    public function show($id)
    {
        return 'Test Id is'.$id;
    }
}