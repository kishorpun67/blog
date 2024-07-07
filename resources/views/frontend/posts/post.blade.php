@extends('frontend.layouts.layout')
@section('content')
<section class="blog-posts grid-system">
    <div class="container">
        @if(empty(auth()->user()->status))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
            Verify your account to post blog. <a href="{{route('verify')}}" style="float: right;">click here for verification</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="all-blog-posts">
            <div class="row">
                <div class="col-md-10">
                    <h2 class="">My Blog</h2>
                </div>
                <div class="col-md-2">
                    <div class="main-button">
                        @if (empty(auth()->user()->status))
                            <a href="javascript:0" onclick="alert('Please! verify your account')">Add Post</a>
                        @else
                            <a href="{{route('add.post')}}">Add Post</a>
                        @endif
                    </div> 
                </div>
            </div>
            <br>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{asset($post->image)}}" alt="Post Image">
                        </div>
                        <div class="down-content">
                            <a href="javascript:void(0);"><h4>{{$post->title}}</h4></a>
                            
                            {!! $post->description !!}
        
                            <ul class="post-info">
                            <li><a href="javascript:void(0);">{{ $post->created_at->diffForHumans()}}</a></li>
                            <li><a href="javascript:void(0);" id="make-like-{{$post->id}}" 
                                class="make-like" attr={{$post->id}}> 
                                <i class="fa {{$post->checkLike($post->id, auth()->user()->id) == 1 ? 'fa-heart' : 'fa-heart-o'}} like-icon"></i> </a>
                                <span class="like-count" id='like-count-{{$post->id}}'>{{ $post->likeCount($post->id)}}</span></li>                         
                                <li><a style="font-size: 18px;
                                    letter-spacing: 0.5px;
                                    font-weight: 900;
                                    color: #f48840;" href="{{route('edit.post', $post->id)}}"><i class="fa fa-edit" title="edit"></i></a></li>
                            <li><a style="font-size: 18px;
                                letter-spacing: 0.5px;
                                font-weight: 900;
                                color: #f48840;" href="{{route('delete.post', $post->id)}}"><i class="fa fa-trash" title="delete"></i></a></li>

                            </ul>
                        </div>
                        </div>
                    </div>
                @endforeach
            
            </div>
        </div>
    </div>
</section>
@endsection