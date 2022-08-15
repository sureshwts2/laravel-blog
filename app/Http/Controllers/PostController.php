<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Hamcrest\Description;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function store(Request $request){
    Post::create([
        'user_id'=>auth()->user()->id,
        'title'=>$request->title,
        'description'=>$request->description,
    ]);
    return back()->with('status','Post created !!');
}



public function show($postId){
    $post=Post::findOrFail($postId);
    return view('post.show',compact('post'));
}

public function edit($postId){
    $post=Post::findOrFail($postId);
    return view('post.edit',compact('post'));

}

public function update($postId,Request $request){
    //dd($request->all());
    Post::findOrFail($postId)->update($request->all());
    return redirect(route('post.all'))->with('status','Post updated !!');
}



public function delete($postId){
    Post::findOrFail($postId)->delete();
    return redirect(route('post.all'))->with('status','Post Deleted !!  '.$postId);;
}

}
