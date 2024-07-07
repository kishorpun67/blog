@extends('frontend.layouts.layout')
@section('content')


<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="down-contact">
                    <div class="row">
                        <div class="col-lg-12 m-auto">
                            <div class="sidebar-item contact-form">
                                <div class="sidebar-heading">
                                    <h2>Add Post</h2>
                                </div>
                                <div class="content">
                                    <form id="contact" action="{{route('add.post')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <label for="title">Title</label>
                                                    <input name="title" type="text" id="title" placeholder="Title" required="" value="{{old('title')}}">
                                                    <p style="color: red; margin: -30px 0 30px 0;">@error('title')
                                                        {{$message}}
                                                    @enderror</p>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <label for="image">Image</label></label>
                                                    <input name="image" type="file" id="image" placeholder="Image" required="">
                                                    <p style="color: red; margin: -30px 0 30px 0;">@error('image')
                                                        {{$message}}
                                                    @enderror</p>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <label for="visibility">Visibility</label></label>
                                                    <br>
                                                    <span>
                                                        Public <input style="height: 15px; width:15px;"  type="radio" name="is_public" id="" value="{{old('title') ?? '1' }}" >
                                                    </span>
                                                    <span class="ml-3">
                                                        Private <input style="height: 15px; width:15px;"   type="radio" name="is_public" id="" value="{{old('title') ?? '0' }}" >
                                                    </span>
                                                    <p style="color: red; margin: -30px 0 30px 0;">@error('visibility')
                                                        {{$message}}
                                                    @enderror</p>                                             
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <label for="description">Description</label>
                                                        <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                                                        <p style="color: red; margin: 0  0 30px 0;"> @error('description')
                                                            {{$message}}
                                                        @enderror</p>
                                                </fieldset>
                                            </div>
     
                                            <div class="col-lg-12 mt-5">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Submit</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection