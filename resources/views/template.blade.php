<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forget Me Not, dog shelter in Singapore</title>
    <!-- Stylesheets -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<?php $menu = [
    ['link'=>'dogs-for-adoption', 'text'=>'Dogs for Adoption'],
    ['link'=>'sponsor-a-dog', 'text'=>'Sponsor'],
    ['link'=>'merchandise', 'text'=>'Merchandise'],
    ['link'=>'events', 'text'=>'Events'],
    ['link'=>'blog', 'text'=>'Blog'],
    ['link'=>'volunteer', 'text'=>'Volunteer'],
    ['link'=>'contact-us', 'text'=>'Contact']
]; ?>

<body>
    <div class="page-wrapper">
        <!-- Main Header-->
        <header class="main-header">
            <!--Header Top-->
            <div class="header-top">
                <div class="auto-container">
                    <div class="top-inner">
                        <div class="clearfix">
                            <div class="top-left">
                                <ul class="clearfix">
                                    <!-- <li><span class="icon flaticon-map-marker"></span>32 Bell South, Harley St. FL</li> -->
                                    <li><a href="#"><span class="icon fa fa-envelope"></span>fmndogshelter@gmail.com</a></li>
                                </ul>
                            </div>
                            <div class="top-right clearfix">
                                <div class="donate-box">
                                    <a href="{{ url("donate") }}" class="theme-btn btn-style-one">Donate</a>
                                </div>
                                <!--social-icon-->
                                <div class="social-icon">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/forgetmenotdogshelter"><span class="fa fa-facebook-square"></span></a></li>
                                        <li><a href="https://www.instagram.com/forgetmenotdogshelter"><span class="fa fa-instagram"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Header-Upper-->
            <div class="header-upper">
                <div class="auto-container clearfix">
                    <div class="pull-left logo-outer">
                        <div class="logo"><a href="{{url('/')}}"><img src="{{asset('images/forgetmenot-dog-shelter-singapore.logo.jpg')}}" alt="" title=""></a></div>
                    </div>
                    <div class="pull-right upper-right clearfix">
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span><i class="fa fa-bars"></i></span>
                                    </button>4
                                </div>
                                <div class="menu clearfix">
                                    <ul class="navigation clearfix">
                                        @foreach($menu as $item)
                                            <li class="dropdown"><a href="{{url($item['link'])}}">{{$item['text']}}</a>
                                            @if(isset($item['submenu']))
                                                <ul>
                                                    @foreach($item['submenu'] as $i)
                                                        <li><a href="pet-detail.html">{{$i['text']}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </nav>
                            
                        </div>
                    </div>
                </div>
                
                <div class="mobile-menu navbar-collapse collapse clearfix">
                    <ul class="navigation clearfix">
                        @foreach($menu as $item)
                            <li class="dropdown"><a href="{{url($item['link'])}}">{{$item['text']}}</a>
                            @if(isset($item['submenu']))
                                <ul>
                                    @foreach($item['submenu'] as $i)
                                        <li><a href="pet-detail.html">{{$i['text']}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--End Header Upper-->
            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="index.html" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>
                    </div>
                    <!--Right Col-->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <ul class="navigation clearfix">
                                        @foreach($menu as $item)
                                                <li class="dropdown"><a href="{{url($item['link'])}}">{{$item['text']}}</a>
                                            @if(isset($item['submenu']))
                                                <ul>
                                                    @foreach($item['submenu'] as $i)
                                                        <li><a href="pet-detail.html">{{$i['text']}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                </div>
            </div>
            <!--End Sticky Header-->
        </header>
        <!--End Main Header -->

        @yield('content')

        <!--Main Footer-->
        <footer class="main-footer">
            <div class="auto-container">
                <div class="footer-bottom">
                    <div class="copyright"><span>Forget Me Not</span> • By Lattice Solutions</div>
                </div>
            </div>
        </footer>
        <!--End Main Footer-->
    </div>
    <!--End pagewrapper-->
    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon flaticon-pawprint-1"></span></div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <!--Revolution Slider-->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('js/owl.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/appear.js')}}"></script>
    <script src="{{asset('js/wow.js')}}"></script>
    <script src="{{asset('js/gallery.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    
</body>

</html>