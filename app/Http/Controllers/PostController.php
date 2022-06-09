<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(){
        $posts= auth()->user()->posts;
        $name ='Post Lists';
        auth()->user()->logs()->create([
            'name'=>$name,
        ]);
        return view('admin.post.post_lists',compact('posts'));
    }

    public function create(){
        $name ='Post Create';
        auth()->user()->logs()->create([
            'name'=>$name,
        ]);
        return view('admin.post.post_create');
    }


    public function store(){
        $inputs = request()->validate([
            'title'=>'required',
            'content'=>'required',
            'img'=>'file'
        ]);
        if(request('img')){
            $inputs['img'] = request('img')->store('images');
        }
        auth()->user()->posts()->create($inputs);
        session()->flash('message-post-create','Post Basariyla Olusturuldu');
        $name ='Post Olusturuldu';
        auth()->user()->logs()->create([
            'name'=>$name,
        ]);
        return redirect()->route('post.index');
       // $inputs = request()->all();
        //return dd($inputs);
    }

    public function edit(Post $id){
        $post =$id;
        $name ='Post Edit';
        auth()->user()->logs()->create([
            'name'=>$name,
        ]);
        return view('admin.post.post_update',compact('post'));
    }

    public function update(Post $id){
        $post =$id;
        $inputs =request()->validate([
            'title'=>'required',
            'content' =>'required',
            'img' => 'file',
        ]);
        if(request('img')){
            $inputs['img'] = request('img')->store('images');
            $post->img =$inputs['img'];
        }
        $post->title =$inputs['title'];
        $post->content =$inputs['content'];
        session()->flash('message-post-update','Post Basariyla Guncellendi');
        $post->save();
        $name ='Post Guncellendi';
        auth()->user()->logs()->create([
            'name'=>$name,
        ]);
        return redirect()->route('post.index');
    }

    public function destroy(Post $id){
        $post = $id;
        $post->delete();
        $name ="Id'si".$post->id."olan Post Silindi";
        auth()->user()->logs()->create([
            'name'=>$name,
        ]);
        Session::flash('message-post-destroy','Post Basariyla Silindi');
        return back();
    }
}
