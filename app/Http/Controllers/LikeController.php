<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like()
    {
        $data = request()->all();
        $count = Like::where(['post_id' => $data['post_id'], 'user_id'=>auth()->user()->id])->count();
        $active;
        if($count > 0) {
            $active = 0;
            Like::where(['post_id' => $data['post_id'], 'user_id'=>auth()->user()->id])->delete();
        }else{
            $active = 1;
            $like = new Like;
            $like->user_id = auth()->user()->id;
            $like->post_id = $data['post_id'];
            $like->save();
        }
        $likeCount = Like::where('post_id', $data['post_id'] )->count();
        return response()->json( ['likeCount' => $likeCount, 'active'=>$active], 200);
    }
}
