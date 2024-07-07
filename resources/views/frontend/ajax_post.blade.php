<div class="row">
    @forelse($posts as $post)
        <div class="col-md-4 col-sm-6">
            <div class="blog-post">
                <div class="blog-thumb">
                    <img src="{{asset($post->image)}}" alt="Post Image">
                </div>
                <div class="down-content">
                    <a href="javascript:void(0);"><h4>{{$post->title}}</h4></a>
                    {!! $post->description !!}
                    <ul class="post-info">
                        <li><a href="#">{{$post->user->name}}</a></li>
                        <li><a href="#">{{ $post->created_at->diffForHumans()}}</a></li>
                        <li><a href="javascript:void(0);" id="make-like-{{$post->id}}" 
                            class="make-like" attr={{$post->id}}> 
                            <i class="fa {{$post->checkLike($post->id, auth()->user()->id) == 1 ? 'fa-heart' : 'fa-heart-o'}} like-icon"></i> </a>
                            <span class="like-count" id='like-count-{{$post->id}}'>{{ $post->likeCount($post->id)}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        @empty
            <div class="col-md-12">
                <h5 class="text-center mt-5">Post not found.</h5>
            </div>
        @endforelse 
    </div>