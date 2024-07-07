@extends('frontend.layouts.layout')
@section('content')


<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="down-contact">
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                            <div class="sidebar-item contact-form">
                                <div class="sidebar-heading">
                                    <h2>SignUp</h2>
                                </div>
                                <div class="content">
                                    <form id="contact" action="{{route('register')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <input name="name" type="text" id="name" placeholder="Your Name" required="">
                                                    <p style="color: red; margin: -30px 0 30px 0;">@error('name')
                                                        {{$message}}
                                                    @enderror</p>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <input name="email" type="email" id="email" placeholder="Your Email" required="">
                                                    <p id="emailStatus" style="color: red; margin: -30px 0 30px 0;">@error('email')
                                                        {{$message}}
                                                    @enderror</p>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <input name="password" type="password" id="password" placeholder="Password" required="">
                                                    <p style="color: red; margin: -30px 0 30px 0;">@error('password')
                                                        {{$message}}
                                                    @enderror</p>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <input name="password_confirmation" type="password" id="password_confirmation" placeholder="Confirm Password" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
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