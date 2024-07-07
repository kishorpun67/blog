<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        '*'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getCreatedAtForHumansAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function likeCount($post_id)
    {
        $count = Like::where(['post_id' => $post_id])->count();
        return $count;
    }
    public function checkLike($post_id, $user_id)
    {
        $count = Like::where(['post_id' => $post_id, 'user_id'=>$user_id])->count();
        return $count;
    }
}
