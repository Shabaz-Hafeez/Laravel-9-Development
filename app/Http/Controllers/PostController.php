<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::withTrashed()->paginate(10);
        return view('post.index' , ['posts' => $posts]);       

    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        

         post::create([
            'title' => $request->title,
            'user_id' => 1,
            'description' =>$request->description,
            'is_publish' =>$request->is_publish,
            'is_active' =>$request->is_active

         ]);
        // dd("Values are saved..... Correctly.....");

            

        $request->Session()->flash('alert-success' , 'Post Saved Successfully');
        // return redirect()->route('posts.create');
        return to_route('posts.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post= Post::find($id);

       if(! $post){
        abort(404);
       }
        return view('post.show' , ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (! $post) {
            abort(404);
        }
        return view('post.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post =Post::find($id);

        if (!$post) {
            abort(404);
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_publish' => $request->is_publish,
            'is_active' => $request->is_active,
        ]);

        $request->session()->flash('alert-info' , 'Post updated Successfully....');

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);
       if (! $post) {
        abort(404);
       }
       $post->delete();

       request()->session()->flash('alert-success-del' , 'Post Deleted Successfully.......');
       return to_route('posts.index');

    }

    public function softDelete($id){
        $post = Post::onlyTrashed()->find($id);
       
        if (!$post) {
            abort(404);
        }
        
        $post->update([
            'deleted_at' => null,
        ]);
        request()->session()->flash('alert-success-und', 'Post Recovered Successfully.......');
        return to_route('posts.index');
    }

    public function getPosts(){
        // RAW QUERIES
        // return DB::table('posts')->where('title' , 'Saepe pariatur Erro')->get();
        $posts = DB::select('select * from posts');
        return $posts;

        // foreach ($posts as $post) {
            
        //         echo $post->title; 
        // }

    // return DB::select('select * from posts where id = ?', [7]);
        // return DB::select('insert into posts (id , title , description , is_active , is_publish) values (? , ? , ? , ? , ?)' , [
        //     7 , 'Laravel Development' , 'This is so sexy framework' , 1 , 1
        // ]);
    }
}
