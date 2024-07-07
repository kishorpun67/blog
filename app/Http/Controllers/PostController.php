<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Post;
use App\Models\User;
use Image;

class PostController extends Controller
{
    
    public function __construct()
    {
        Session::flash('page', 'post');
    }
    public function index()
    {
        $posts = Post::with('user')->where('user_id', auth()->user()->id)->get();
        return view('frontend.posts.post', ['posts' => $posts]);
    }

    public function addPost(Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->all();
            
            $this->validation($request);

            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                if($image_tmp->isValid()) {
                    $filename = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->storeAs('public/images/post/', $filename);
                    $image_path = 'storage/images/post/'.$filename;
                }
            }
            $post = new Post();
            $post->user_id= auth()->user()->id;
            $post->title = $data['title'];
            $post->image = $image_path;
            $post->is_public = $data['is_public'];
            $post->description = $data['description'];
            $post->status = true;
            $post->save();
            return to_route('post')->with('success', 'Post has been created successfully.');
        }

        return view('frontend.posts.add_post');
    }


    public function editPost(Request $request, $id)
    {
        if($request->isMethod('POST')){
            $data = $request->all();
            
            $this->validation($request);

            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                if($image_tmp->isValid()) {
                    $filename = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->storeAs('public/images/post/', $filename);
                    $image_path = 'storage/images/post/'.$filename;
                }
            }
            $post = Post::where(['id'=>$id, 'user_id'=>auth()->user()->id])->first();
            $post->user_id= auth()->user()->id;
            $post->title = $data['title'];
            if(!empty($image_path)) $post->image = $image_path;
            $post->is_public = $data['is_public'];
            $post->description = $data['description'];
            $post->status = true;
            $post->save();
            return to_route('post')->with('success', 'Post has been updated successfully.');
        }
        $count = Post::where(['id' => $id, 'user_id' =>auth()->user()->id])->count();
        if($count <= 0) {
            return to_route('index')->with('error', 'Record not found');
        }   
        $post = Post::where(['id' => $id, 'user_id' =>auth()->user()->id])->first();
        return view('frontend.posts.edit_post', ['post' => $post]);
    }

    public function deletePost($id) {
        Post::where(['id' => $id, 'user_id' =>auth()->user()->id])->delete();
        return redirect()->back()->with('success', 'Post has been deleted successfully');
    }
    public function validation($request)
    {
        $rules = [
            'title' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_public'=> 'required|boolean',
            'description' => 'required|string|min:10',
          
        ];
        $customMessages = [
            'title.required' => 'The title is required.',
            'title.max' => 'The title must not exceed 100 characters.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'image.max' => 'The image must not be greater than 2MB.',
            'description.required' => 'The message is required.',
            'description.min' => 'The message must be at least 10 characters.',
        ];
        $this->validate($request, $rules, $customMessages);

    }
    
}
