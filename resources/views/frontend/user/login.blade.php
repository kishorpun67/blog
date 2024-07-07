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
                                    <h2>Signin</h2>
                                </div>
                                <div class="content">
                                    <form id="contact" action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <input name="email" type="text" id="email" placeholder="Your email" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <input name="password" type="password" id="password" placeholder="Password" required="">
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