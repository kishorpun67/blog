@extends('frontend.layouts.layout')
@section('content')


<section class="blog-posts grid-system">
    <div class="container">
        @if(empty(auth()->user()->status))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                Verify your account to post blog. <a href="{{route('verify')}}" style="float: right;">Click Here</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
      <div class="all-blog-posts">
        <div class="row">
            <div class="col-md-2">
                <h2 class="">All Blog</h2>
            </div>
            <div class="col-md-4">
                <form action="javascript:void(0);">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Serach">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <fieldset>
                                <button type="submit" id="form-submit" class="btn btn-defaul">Search</button>
                            </fieldset>                        
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="sort" id="sort" class="form-control">
                        <option >Date Posted</option>
                        <option value="latest">Latest</option>
                        <option value="oldest">Oldest</option>
                    </select>
                </div>
            </div>  
            <div class="col-md-3">
                <div class="form-group">
                    <select name="author_id" id="author_id" class="form-control">
                        <option value="all" >All Authors</option>
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>        
        <br>
        <div class="show-post" id="show-post">
            @include('frontend.ajax_post')
        </div>
      </div>
    </div>
  </section>
@endsection