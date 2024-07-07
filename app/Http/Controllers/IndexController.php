<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Post;
use View;
use App\Models\User;

class IndexController extends Controller
{
    public function index() 
    {
        if(request()->ajax()){
            $data = request()->all();
            $posts = Post::with('user')->where(['is_public'=>1]);

            // order post by latest 
            if(!empty($data['sort'])) {
                if ($data['sort'] == 'latest') {
                    $posts->orderby('posts.id', 'Desc');
                } else if($data['sort'] == 'oldest') {
                    $posts->orderby('posts.id', 'Asc');
                }
            }

            // get post by user 
            if(!empty($data['author_id']) && $data['author_id'] !== 'all') {
                $posts->where('posts.user_id', $data['author_id']);
            }

            if(!empty($data['search'])){
                $serchPost = $data['search'];
                $posts->where(function($query) use($serchPost) {
                    $query->where('posts.title','like', "%". $serchPost. "%")
                    ->orWhere('posts.description','like', "%". $serchPost. "%");
                });
            }
            $posts = $posts->get();
            return response()->json([
                'view'=>(String)View::make('frontend.ajax_post')
                ->with(compact('posts'))
            ]);
        }else{
            $posts = Post::with('user')->where(['is_public'=>1])->inRandomOrder()->get();
            $authors = User::where('status',1)->get();
            Session::flash('page', 'index');
            return view('frontend.home', ['posts' => $posts, 'authors' =>$authors]);
        }
    }
}
