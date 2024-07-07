<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Blog Website</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/richtexteditor/rte_theme_default.css')}}" />
    <script type="text/javascript" src="{{asset('frontend/richtexteditor/rte.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/richtexteditor/plugins/all_plugins.js')}}"></script>
  </head>

  <body>
      <!-- ***** Preloader Start ***** -->
      {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   --}}
    <!-- ***** Preloader End ***** -->

    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
      <!-- Bootstrap core JavaScript -->
      <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
      <!-- Additional Scripts -->
      <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
      <script src="{{asset('frontend/assets/js/owl.js')}}"></script>
      <script src="{{asset('frontend/assets/js/slick.js')}}"></script>
      <script src="{{asset('frontend/assets/js/isotope.js')}}"></script>
      <script src="{{asset('frontend/assets/js/accordions.js')}}"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script src="{{asset('frontend/js/custom.js')}}"></script>

      <script language = "text/Javascript"> 
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
            }
        }
        var editor1 = new RichTextEditor("#description");
      </script>
    <script>
            @if(Session::has('success'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                    toastr.success("{{ session('success') }}");
            @endif
            @if(Session::has('error'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.error("{{ session('error') }}");
            @endif
        </script>
        @yield('script')
    </body>
  </html>