<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// Route::get('/greetings', function () {
//     return ('Hello World');
// });


// Route::get('user/{id}', function($id){
//     return "User is login with ID = " .$id;

// });


// Route::get('user/{name?}',function($name = null){
//     return "User name is " . $name;

// });

// Route::get('/user/{id}', function($id){
//  return 'User id is = ' .$id;
// })->where('id' , '[0-9+]');


// Route::get('/user/{name}', function ($name) {
//     return 'User name is ' . $name;
// })->where('name', '[A-Za-z]+');


// Route::get('/user/{id?}/{name?}', function ($id = null, $name = null) {
//     return "User Id and Name is as " .$id  .$name;
// })->where(['id' => '[0-9]+' , 'name'=> '[A-Za-z]+']);

Route::redirect('/', 'login');


Route::get('login', function(){
    // return '<Button><a href="about">Click here to redirect to About Us Page   </a></Button>';
    return view('post.create');
});

// Route::get('about' , function(){
//     return "About US";
// });

// Route::view('greeting' , 'greetings');

// Route::get('greeting' , function(){
//     $name = "Shahbaz Mir";
//     return view ("greetings", ['name' => $name]);
// });

// Route::get('test' , function(){

//     return view ('Admin.profile');
// });

// Route::get('test', function () {

//     return view('test');
// });

// Route::get('post', function () {

//     return view('post');
// });

// Route::get('users', [UserController::class , 'index']);
// // Route::get('test', [UserController::class, 'test']);
// Route::get('users/show/{id}', [UserController::class , 'show']);



// Route::get('connection' , function() {

//     try {
//         DB::connection()->getPdo();
//         return 'Database Connected Successfully.......';
//     } catch (\Exception $ex) {
//        dd( $ex->getMessage());
//     }

// });

// Route::get('test' , function(){
// post::create([
//     'title' => 'Php 8',
//     'description' => 'Php 8 is very cool',
//     'is_publish' => false,
//     'is_active' => false,

// ]);

// return 'Inserted Successfully.......';

// $posts =post::where(['title' => 'laravel 9' ,'description' => 'Laravel 9 is very cool'])->get();
//     if (! $posts) {
//        return 'Post does not exist';
//     }

// return $posts;


// $post= post::find(2);

// if (!$post) {
//        return 'Post does not exist';
//     }
// $post->update([
//     'title' => 'Laravel 11',
//     'description' => 'Laravel 10 Description'
// ]);
// return $post;

//     $post = post::find(4);

//     if(! $post){
//         return "Post Not Found........";
//     }else {
//         $post->delete();
//         return 'Post Deleted Successfully.....';
//     }

// });

// Route::get('posts' , [PostController::class , 'index']);
// Route::get('posts/store' ,[PostController::class , 'store']);
// Route::get('posts/update', [PostController::class, 'update']);
// Route::get('posts/destroy', [PostController::class, 'destroy']);


// Route::get('test' , function(Request $request){

//     Session::put('login' , 'You are logged in.......');
//     // Session::flush();

//     if (session::has('login')) {
//         return "Session is Set Successfully........";
//     } else {
//         return "Session is not Set ";
//     }


// });


//  $request->session()->put('alert-success','Post saved Successfully....');
//  $request->session()->forget('alert-success');
//  if ($request->session()->get('alert-success')) {
//     return 'set';
//  }
//  else{
//     return 'not set';
//  }


//  Session::put('alert-success','Post Saved Successfully.....');
// // session::forget('alert-success');
//     session::flush();

Route::resource('posts', PostController::class);
Route::get('posts/soft-delete/{id}' , [PostController::class , 'softDelete'])->name('posts.soft-delete');

//DB Query Builders

// Route::get('get/posts' , [PostController::class , 'getPosts'])->name('get.posts');
Route::get('test' , function(){
    //  one to one
    //  $user = User::first();
    //  return $user->post;
    // one to one inverse
    // $post = post::first();
    // return $post->user;
    // one to many
    //  $user =User::first();
    //  //  return $user->post->where('title' , 'Expedita dolor in qu');
    //  return $user->posts;
    // one to many Inverse

    // $post = Post::first();
    // return $post->user;
    //  has one through
    // $user = User::first();
    // return $user->postComment; 
    //has many throug
    // $user = user::first();
    // return $user->postComments;
    //many to many relation
    // $user = User::first();
    // $role = Role::first();
    // return $user->roles()->attach($role);
    // return $user->roles()->attach($role);
    // return $role->users()->attach($user);
    // return $role->users()->detach($user);
    // async mehod
    // $user = User::first();
    // $user->roles()->sync([2]);
    // return 'Attached';
    //one to one polymorphic
    //  $user = User::first();
    //  return $user->image;
    //OR
    //  $post = post::first();
    //  return $post->image;
    // one to many polymorphic
    // $post = post::first();
    // return $post->image;
    // OR
    // $user = User::first();
    // return $user->images;
    // manytomany plymorphic
    $post = post::first();
    return $post->tags;

});
