<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>RM-menara</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('FrontEnd/img/menara1.jpg') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

    <!-- Flaticon Font -->
    <link href="{{ asset('/FrontEnd/lib/flaticon/font/flaticon.css') }}" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/FrontEnd/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/FrontEnd/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/FrontEnd/css/style.css') }}" rel="stylesheet" />

</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 45px">
                RM_Menara
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="/" class="nav-item nav-link">Home</a>
                    <a href="/reservasi" class="nav-item nav-link">Reservasi</a>
                    <a href="{{ route('user.feedback') }}" class="nav-item nav-link">Feedback</a>
                    <div class="nav-item dropdown">
                        <a href="/" class="nav-link dropdown-toggle" data-toggle="dropdown">Menu</a>
                        <div class="dropdown-menu">
                            @foreach ($kategori as $item)
                                <a href="/menu/{{ $item->slug }}" class="dropdown-item">{{ $item->nama }}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="/aboutus" class="nav-item nav-link">About Us</a>
                </div>
                <style>
                    .cart-icon {
                        position: relative;
                        display: inline-block;
                    }
                
                    .cart-badge {
                        position: absolute;
                        top: -5px;
                        right: -5px;
                        height: 10px;
                        width: 10px;
                        background-color: red;
                        border-radius: 50%;
                        display: inline-block;
                    }
                </style>
                
                @if (Auth::check())
                    <span class="cart-icon" style="margin-right: 10px">
                        <a href="{{ route('viewcart') }}">
                            <i class="fas fa-shopping-cart"></i>
                            @if ($cartItemsCount  > 0) <!-- Check if there are items in the cart -->
                                <span class="cart-badge"></span>
                            @endif
                        </a>
                    </span>
                    <a style="margin-right: 10px; font-weight: bold; margin-inline-start: 10px">Hello, {{ Auth::user()->name }}</a>
                    <a href="{{ route('logout') }}" class="btn btn-primary px-3">Logout</a>
                @else
                    <a href="/login" class="btn btn-primary px-3">Login</a>
                @endif

            </div>
        </nav>
        
        @if (session('alert'))
            <div class="alert alert-warning">
                {{ session('alert') }}
            </div>
        @endif
        
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg- px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="img/.png" alt="" />
            </div>
        </div>
    </div>
