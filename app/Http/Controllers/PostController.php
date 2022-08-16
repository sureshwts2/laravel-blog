<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
   public function store(Request $request){

    $validator= Validator::make($request->all(),[
        'title'=>'required',
        'description'=>'required',
        'image'=>'required | image'
    ]);

    if($validator->fails()){
        return back()->with('status','Something wrong!!!!');
    }else{
        $imageName=time() . "." .$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
        Post::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imageName
        ]);
    }


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
