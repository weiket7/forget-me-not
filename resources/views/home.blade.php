<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forget Me Not, dog shelter in Singapore</title>
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>
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
                                <div class="donate-box"><a href="donation.html" class="theme-btn btn-style-one">donate</a></div>
                                <!--social-icon-->
                                <div class="social-icon">
                                    <ul class="clearfix">
                                        <!-- <li><a href="#"><span class="fa fa-twitter"></span></a></li> -->
                                        <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                                        <li><a href="https://www.instagram.com/forgetmenotdogshelter"><span class="fa fa-instagram"></span></a></li>
                                        <!-- <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                        <li><a href="#"><span class="fa fa-youtube-play"></span></a></li>
                                        <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li> -->
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
                        <div class="logo"><a href="{{url('/')}}"><img src="images/forgetmenot-dog-shelter-singapore.logo.jpg" alt="" title=""></a></div>
                    </div>
                    <div class="pull-right upper-right clearfix">
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span><i class="fa fa-bars"></i></span>
                                    </button>
                                </div>
                                <?php $menu = ['home'=>'Home', 'about-us'=>'About Us', 'sponsor'=>'Sponsor a dog',
                                'blog'=>'Blog', 'contact-us'=>'Contact Us'] ?>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        @foreach($menu as $link => $text)
                                            <li class="dropdown"><a href="{{url($link)}}">{{$text}}</a>
                                        @endforeach
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                            <!-- <div class="outer-box">
                                <div class="search-box-outer">
                                    <div class="dropdown">
                                        <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                        <ul class="dropdown-menu pull-right search-panel menu-search" aria-labelledby="dropdownMenu3">
                                            <li class="panel-outer">
                                                <div class="form-container">
                                                    <form method="post" action="blog.html">
                                                        <div class="form-group">
                                                            <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                            <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
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
                                    @foreach($menu as $link => $text)
                                        <li class="dropdown"><a href="{{url($link)}}">{{$text}}</a>
                                    @endforeach
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
        <!--Welcome Section-->
        <section class="welcome-section">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title centered">
                    <div class="separator">
                        <span class="icon flaticon-pawprint-1"></span>
                    </div>
                    <div class="title">Caring for the forgotten strays in Singapore</div>
                    <h2>Forget Me Not</h2>
                </div>
                <div class="row clearfix">
                    <!--Image Column-->
                    <div class="image-column col-md-6 col-sm-12 col-xs-12">
                        <div class="image">
                           <img src="{{ asset("images/".$featuredPost->image) }}">
                    </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column col-md-6 col-sm-12 col-xs-12">
                            <div class="inner-column">
                                <h2>{{$featuredPost->title}}</h2>

                                {!! nl2br($featuredPost->shortDesc) !!}

                                <a href="{{url("blog/".$featuredPost->slug)}}" class="theme-btn btn-style-two">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--End Welcome Section-->
        <!--Featured Section-->
        <section class="featured-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Featured Block-->
                    <div class="featured-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="0ms">
                            <div class="content">
                                <div class="icon-box">
                                    <span class="icon flaticon-face-of-staring-dog"></span>
                                </div>
                                <h3><a href="#">Adopt</a></h3>
                                <div class="text">20 dogs for adoption, one of them might be suitable for you</div>
                            </div>
                        </div>
                    </div>
                    <!--Featured Block-->
                    <div class="featured-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                            <div class="content">
                                <div class="icon-box">
                                    <span class="icon flaticon-dog-bone"></span>
                                </div>
                                <h3><a href="#">Sponsor</a></h3>
                                <div class="text">Help dogs with costs of food, accomodation, sterilisation, vaccination etc</div>
                            </div>
                        </div>
                    </div>
                    <!--Featured Block-->
                    <div class="featured-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-duration="2500ms" data-wow-delay="0ms">
                            <div class="content">
                                <div class="icon-box">
                                    <span class="icon flaticon-pawprint-1"></span>
                                </div>
                                <h3><a href="#">Donate</a></h3>
                                <div class="text">Donate towards costs like rescuing, medication</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Featured Section-->
        <!--Services Section-->
        <section class="services-section" style="background-image:url(images/background/services-image-1.png)">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title centered">
                    <div class="separator">
                        <span class="icon flaticon-pawprint-1"></span>
                    </div>
                    <div class="title">Showing 12 random out of 24 dogs in random order</div>
                    <h2>Dogs for adoption</h2>
                </div>
                <div class="single-item-carousel owl-carousel owl-theme">
                    <div class="slide">
                        <div class="row">
                            @foreach($adopts as $adopt)
                                <div class="services-block col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="icon-box">
                                                <img src=" {{ asset("images/adopts/".$adopt->image) }}" class="home-dog-img">
                                            </div>
                                            <h3><a href="services.html">{{ $adopt->name }}</a></h3>
                                            <div class="text">{{ $adopt->desc }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Services Section-->

        <!--News Section-->
        <section class="news-section">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title centered">
                    <div class="separator">
                        <span class="icon flaticon-pawprint-1"></span>
                    </div>
                    <!-- <div class="title">Because We Really Care About Your Pets</div> -->
                    <h2>Blog</h2>
                </div>
                <div class="row clearfix">
                    <!--News Block-->
                    <div class="news-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0ms">
                            <div class="image">
                                <div class="post-date">25 <span>Feb</span></div>
                                <a href="blog-single.html"><img src="images/senior-dog.png" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <!-- <ul class="news-info">
                                    <li>Pets</li>
                                    <li>20 comments</li>
                                </ul> -->
                                <h3><a href="blog-single.html">Our role here is solely focused on the wellness of Rusty. 
                                </a></h3>
                                <a href="blog-single.html" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!--News Block-->
                    <div class="news-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box wow fadeInUp" data-wow-duration="2000ms" data-wow-delay="0ms">
                            <div class="image">
                                <div class="post-date">28 <span>Feb</span></div>
                                <a href="blog-single.html"><img src="images/adopted1.png" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <!-- <ul class="news-info">
                                    <li>Grommings</li>
                                    <li>20 comments</li>
                                </ul> -->
                                <h3><a href="blog-single.html">Lola with her incredible Mommies</a></h3>
                                <a href="blog-single.html" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!--News Block-->
                    <div class="news-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box wow fadeInUp" data-wow-duration="3000ms" data-wow-delay="0ms">
                            <div class="image">
                                <div class="post-date">30 <span>Feb</span></div>
                                <a href="blog-single.html"><img src="images/merch1.jpg" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <!-- <ul class="news-info">
                                    <li>pets shelter</li>
                                    <li>20 comments</li>
                                </ul> -->
                                <h3><a href="blog-single.html">Today, we are presenting our long awaited FMN Version 3.0 tee-shirt</a></h3>
                                <a href="blog-single.html" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End News Section-->

        <!--Appointment Section-->
        <section class="appointment-section">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title centered">
                    <div class="separator">
                        <span class="icon flaticon-pawprint-1"></span>
                    </div>
                    <div class="title">Aopt your new family member</div>
                    <h2>Contact Us</h2>
                </div>
                <!--Default Form-->
                <div class="default-form">
                    <div class="form-box">
                        <form method="post" action="contact-form">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" value="" placeholder="Mobile" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" value="" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="phone" value="" placeholder="Subject" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <textarea placeholder="Message"></textarea>
                                </div>
                                <div class="form-group text-center col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="theme-btn btn-style-two">Send request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Default Form-->
            </div>
        </section>
        <!--End Appointment Section-->
        
        <!--Save Pets Section-->
        <!--<section class="save-pets-section">
            <div class="auto-container">
                <h2>Help Us & Save More Pets</h2>
                <div class="text">More forwardly echidna outside tiger split thanks vibrantly gosh hence pangolin however notwithstanding <br> leapt untruthful gauchely yikes komodo successful concentrically dully more.</div>
                <div class="prices-block">
                    <div class="row clearfix">
                        <div class="price-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <h3>$35</h3>
                                <a href="#" class="theme-btn btn-style-three">For Pets Food</a>
                            </div>
                        </div>
                        <div class="price-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <h3>$60</h3>
                                <a href="#" class="theme-btn btn-style-four">For Medicine</a>
                            </div>
                        </div>
                        <div class="price-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <h3>$85</h3>
                                <a href="#" class="theme-btn btn-style-five">For Vet Visit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!--End Save Pets Section-->
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
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <!--Revolution Slider-->
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/gallery.js"></script>
    <script src="js/script.js"></script>
    
</body>

</html>