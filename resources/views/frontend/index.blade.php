<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} | {{ $user_id->user_name }}</title>
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

<body id="page-top">

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
                        <a class="nav-link js-scroll active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#work">Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/ Nav End /-->

    <!--/ Intro Skew Star /-->
    <div id="home" class="intro route bg-image" style="background-image: url({{ asset('cv/' . $hero?->image) }})">
        <!-- Overlay for background image -->
        <div class="overlay-itro"></div>

        <!-- Content display using table layout -->
        <div class="intro-content display-table">
            <div class="table-cell">
                <!-- Container for content -->
                <div class="container">
                    <!-- Dynamic title -->
                    <h1 class="intro-title mb-4 text-capitalize" id="name">I am {{ $hero?->title }}</h1>

                    <!-- Dynamic subtitle -->
                    <p class="intro-subtitle">
                        <span class="text-slider-items">

                            @if ($hero)


                                @foreach ($hero?->subtitles as $key => $item)
                                    @if ($key > 0)
                                        {{ ',' }}
                                    @endif
                                    {{ $item->sub_title }}
                                @endforeach
                            @endif
                        </span>
                        <strong class="text-slider"></strong>
                    </p>

                    <!-- Additional content or buttons can be added here if needed -->
                </div>
            </div>
        </div>
    </div>

    <!--/ Intro Skew End /-->

    <!-- About Me Start  -->
    <section id="about" class="about-mf sect-pt4 route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5">
                                        <div class="about-img animate__animated animate-on-scroll"
                                            data-animation="animate__flipInX">
                                            <img src="{{ asset('cv/' . ($personal_info ? $personal_info->image : '')) }}"
                                                class="img-fluid rounded b-shadow-a" alt="">

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="about-info">
                                            <p class="animate__animated animate-on-scroll"
                                                data-animation="animate__lightSpeedInRight"><span class="title-s">Name:
                                                </span><span
                                                    style="color: #ddd;">{{ $personal_info?->full_name }}</span></p>
                                            <p class="animate__animated animate-on-scroll"
                                                data-animation="animate__lightSpeedInRight"><span
                                                    class="title-s">Profile: </span> <span
                                                    style="color: #ddd;">{{ $personal_info?->profile }}</span></p>
                                            <p class="animate__animated animate-on-scroll"
                                                data-animation="animate__lightSpeedInRight"><span
                                                    class="title-s">Email:
                                                </span> <span style="color: #ddd;">{{ $personal_info?->email }}</span>
                                            </p>
                                            <p class="animate__animated animate-on-scroll"
                                                data-animation="animate__lightSpeedInRight"><span
                                                    class="title-s">Phone:
                                                </span> <span style="color: #ddd;">{{ $personal_info?->phone }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-mf" id="skills">
                                    <p class="title-s">Skill</p>
                                    @foreach ($skills as $skill)
                                        <span>{{ $skill?->title }}</span> <span
                                            class="pull-right">{{ $skill?->percent }}%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $skill?->percent }}%;"
                                                aria-valuenow="{{ $skill?->percent }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-me pt-4 pt-md-0">
                                    <div class="title-box-2">
                                        <h5 class="title-left animate__animated animate-on-scroll"
                                            data-animation="animate__heartBeat animate__delay-2s">
                                            About Me
                                        </h5>
                                    </div>
                                    <div class="lead animate__animated animate-on-scroll"
                                        data-animation="animate__fadeInUp" style="color: #fff; !important">
                                        {!! $personal_info?->description !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Me End  -->

    <!--/ Section Services Star /-->
    <section id="service" class="services-mf route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a animate__animated animate-on-scroll"
                            data-animation="animate__lightSpeedInLeft">
                            Services
                        </h3>
                        <p class="subtitle-a animate__animated animate-on-scroll" data-animation="animate__heartBeat">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($services as $service)
                    <div class="col-md-4 parent-container">
                        <div class="service-box">
                            <div class="service-ico animate__animated animate-on-scroll"
                                data-animation="animate__flash">
                                {{-- <span class="ico-circle" style="font-size: 24px">
                                    <span class="material-symbols-outlined" >
                                        terminal
                                    </span>
                                </span> --}}
                                <span class="ico-circle"><i class="{{ $service?->image }}"></i></span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">{{ $service?->title }}</h2>
                                <p class="s-description text-center">
                                    {!! $service?->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/ Section Services End /-->

    <div class="section-counter paralax-mf bg-image"
        style="background-image: url({{ asset('frontend/img/counters-bg.jpg') }})">
        <div class="overlay-mf"></div>
        <div class="container">
            <div class="row">

                @foreach ($achievement_counter as $item)
                    <div class="col-sm-3 col-lg-3">
                        <div class="counter-box">
                            <div class="counter-ico">
                                <span class="ico-circle"><i class="{{ $item?->image }}"></i></span>
                            </div>
                            <div class="counter-num">
                                <p class="counter" style="font-weight: 700; color: #000;">{{ $item?->count }}</p>
                                <span class="counter-text"
                                    style="font-weight: 700; color: #000;">{{ $item?->title }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

    <!--/ Section Portfolio Star /-->
    <section id="work" class="portfolio-mf sect-pt4 route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a animate__animated animate-on-scroll"
                            data-animation="animate__lightSpeedInLeft">
                            Portfolio
                        </h3>
                        <p class="subtitle-a animate__animated animate-on-scroll" data-animation="animate__heartBeat">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($portfolios as $item)
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="{{ $item?->link }}" data-lightbox="gallery-mf">
                                <div class="work-img">
                                    <img src="{{ asset('cv/' . ($item ? $item->image : '')) }}" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h2 class="w-title animate__animated animate-on-scroll"
                                                data-animation="animate__jello">{{ $item?->title }}</h2>
                                            <div class="w-more animate__animated animate-on-scroll"
                                                data-animation="animate__backInLeft">
                                                <span class="w-ctegory"> <a
                                                        href="{{ $item?->link }}">Link</a></span> / <span
                                                    class="w-date">{{ date('d, F Y', strtotime($item?->created_at)) }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="w-like">
                                                <span class="ion-ios-plus-outline"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
    <!--/ Section Portfolio End /-->

    <!--/ Section Testimonials Star /-->
    <div class="testimonials paralax-mf bg-image"
        style="background-image: url({{ asset('frontend/img/overlay-bg.jpg') }})">
        <div class="overlay-mf"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div id="testimonial-mf" class="owl-carousel owl-theme">
                        @foreach ($testimonials as $item)
                            <div class="testimonial-box">
                                <div class="author-test">
                                    <img src="{{ asset('cv/' . ($item ? $item->image : '')) }}"
                                        style="width: 100px; height: 100px; rounded="100%" alt=""
                                        class=" img-fluid rounded-circle b-shadow-a">
                                    <span class="author">{{ $item?->name }}</span>
                                </div>
                                <div class="content-test">
                                    <p class="description lead">
                                        {!! $item?->description !!}
                                    </p>
                                    <span class="comit"><i class="fa fa-quote-right"></i></span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/ Section Blog Star /-->

    @if (count($blogs) > 0)
        <section id="blog" class="blog-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a animate__animated animate-on-scroll"
                                data-animation="animate__lightSpeedInLeft">
                                Blog
                            </h3>
                            <p class="subtitle-a animate__animated animate-on-scroll"
                                data-animation="animate__heartBeat">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach ($blogs as $blog)
                        <div class="col-md-4">
                            <div class="card card-blog">
                                <div class="card-img">
                                    <a
                                        href="{{ route('blog_single', ['user_name' => $user_id->user_name, 'slug' => $blog->slug]) }}"><img
                                            src="{{ asset('cv/' . ($blog ? $blog->image : '')) }}" alt=""
                                            class="img-fluid"></a>
                                </div>
                                <div class="card-body">
                                    <div class="card-category-box">
                                        <div class="card-category">
                                            <h6 class="category animate__animated animate-on-scroll"
                                                data-animation="animate__flash">{{ $blog->category->name }}</h6>
                                        </div>
                                    </div>
                                    <h3 class="card-title animate__animated animate-on-scroll"
                                        data-animation="animate__fadeInUp"><a
                                            href="{{ route('blog_single', ['user_name' => $user_id->user_name, 'slug' => $blog->slug]) }}">
                                            {{ $blog->title }}</a></h3>
                                    <p class="card-description animate__animated animate-on-scroll"
                                        data-animation="animate__fadeInUp">
                                        {!! strlen($blog->body) > 150 ? substr($blog->body, 0, 150) . '...' : $blog->body !!}

                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="post-author animate__animated animate-on-scroll"
                                        data-animation="animate__fadeInLeft">
                                        <a href="#">
                                            <img src="{{ asset('cv/' . ($personal_info ? $personal_info->image : '')) }}"
                                                alt="{{ $user_id->name }}" class="avatar rounded-circle">
                                            <span class="author">{{ $personal_info->full_name }}</span>
                                        </a>
                                    </div>
                                    <div class="post-date animate__animated animate-on-scroll"
                                        data-animation="animate__fadeInRight">
                                        <span class="ion-ios-clock-outline"></span>
                                        {{ $blog->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
    @else
        <section class="paralax-mf footer-paralax bg-image route"
            style="background-image: url({{ asset('frontend/img/overlay-bg.jpg') }}); margin-top:-50px">
            <div class="overlay-mf"></div>
            <div class="container" style="background:none;">
                <div class="row">
                    <div class="col-lg-12">
                        <hr style="margin:0 !important; color:#fff; background:#fff">

                    </div>
                </div>
            </div>
        </section>
    @endif

    <!--/ Section Blog End /-->

    <!--/ Section Contact-Footer Star /-->
    <section class="paralax-mf footer-paralax bg-image route"
        style="background-image: url({{ asset('frontend/img/overlay-bg.jpg') }})">
        <div class="overlay-mf"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-mf">
                        <div id="contact" class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="title-box-2">
                                        <h5 class="title-left">
                                            Send Message Us
                                        </h5>
                                    </div>
                                    <div>
                                        <form action="{{ route('contact.save') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user_id->id }}"
                                                id="">
                                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                                            <div id="errormessage"></div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" placeholder="Your Name"
                                                            data-rule="minlen:4"
                                                            data-msg="Please enter at least 4 chars" />
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email"
                                                            id="email" placeholder="Your Email" data-rule="email"
                                                            data-msg="Please enter a valid email" />
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="subject"
                                                            id="subject" placeholder="Subject" data-rule="minlen:4"
                                                            data-msg="Please enter at least 8 chars of subject" />
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="message" rows="5" data-rule="required"
                                                            data-msg="Please write something for us" placeholder="Message"></textarea>
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 animate__animated animate-on-scroll"
                                                    data-animation="animate__flash animate__delay-3s">
                                                    <button type="submit"
                                                        class="button button-a button-big button-rouded">Send
                                                        Message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="title-box-2 pt-4 pt-md-0">
                                        <h5 class="title-left animate__animated animate-on-scroll"
                                            data-animation="animate__heartBeat animate__delay-2s">
                                            Get in Touch
                                        </h5>
                                    </div>
                                    <div class="more-info">
                                        <p class="lead animate__animated animate-on-scroll"
                                            data-animation="animate__fadeInUp" style="color: #ddd;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum
                                            dolorem soluta quidem
                                            expedita aperiam aliquid at.
                                            Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis
                                            mollitia inventore?
                                        </p>
                                        <ul class="list-ico animate__animated animate-on-scroll"
                                            data-animation="animate__fadeInRight">
                                            <li style="color: #ddd;"><span class="ion-ios-location"></span>
                                                {{ $personal_info?->address }}</li>
                                            <li style="color: #ddd;"><span class="ion-ios-telephone"></span>
                                                {{ $personal_info?->phone }}</li>
                                            <li style="color: #ddd;"><span class="ion-email"></span>
                                                {{ $personal_info?->email }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="socials">
                                        <ul>
                                            @foreach ($social_media as $item)
                                                <li class="animate__animated animate-on-scroll"
                                                    data-animation="animate__flash"><a href=""><span
                                                            class="ico-circle"><i
                                                                class="{{ $item->icon }}"></i></span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright-box">
                            <p class="copyright">&copy; Copyright <strong>Web Arts Factory</strong>. All Rights
                                Reserved</p>
                            <div class="credits">
                                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                                Designed by <a href="https://webartsfactory.com/">Web Arts Factory</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
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
