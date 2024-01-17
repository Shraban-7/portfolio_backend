<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} | Blog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href={{ asset('frontend/img/favicon.png') }}" rel="icon">
    <link href={{ asset('frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('frontend/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('frontend/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Animation CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- icon -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <!-- Laravel Toster  -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <!-- Main Stylesheet File -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

    <!--/ Nav Star /-->
    <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll" href="#page-top">Portfolio</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll active" href="{{ route('home', $user_id->user_name) }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="{{ route('home', $user_id->user_name) }}/#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll"
                            href="{{ route('home', $user_id->user_name) }}/#service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="{{ route('home', $user_id->user_name) }}/#work">Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll"
                            href="{{ route('home', $user_id->user_name) }}/#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/ Nav End /-->

    <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
        <div class="overlay-mf"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
                <div class="container">
                    <h2 class="intro-title mb-4">Blog Details</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home', $user_id->user_name) }}">Home</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--/ Intro Skew End /-->

    <!--/ Section Blog-Single Star /-->
    <section class="blog-wrapper sect-pt4" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-box">
                        <div class="post-thumb">
                            <img src="img/post-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="post-meta">
                            <h1 class="article-title">{{ $blog->title }}</h1>
                            <ul>
                                <li>
                                    <span class="ion-ios-person">{{ $personal_info->full_name }}</span>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <span class="ion-pricetag"></span>
                                    <span>{{ $blog->category->name }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="article-content">
                            {!! $blog->body !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget-sidebar">
                        <h5 class="sidebar-title">All Post</h5>
                        <div class="sidebar-content">
                            <ul class="list-sidebar">
                                @foreach ($blogs as $blog)
                                    <li>
                                        <a
                                            href="{{ route('blog_single', ['user_name' => $user_id->user_name, 'slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--/ Section Blog-Single End /-->

    <!--/ Section Blog End /-->

    <!--/ Section Contact-Footer Star /-->

    <!--/ Section Contact-footer End /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('frontend/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/popper/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/jquery.counterup.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/typed/typed.min.js') }}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('frontend/contactform/contactform.js') }}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    {{-- <script>
         @if (Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('success') }}");
    </script> --}}

</body>

</html>
