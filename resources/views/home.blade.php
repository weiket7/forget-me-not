@extends('template')

@section('content')
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
                <div class="title">Showing 4 random out of {{ $adoptCount }} dogs in random order</div>
                <h2>Dogs for adoption</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme">
                <div class="slide">
                    <div class="row">
                        @foreach($adopts as $adopt)
                            <div class="services-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="{{ url("view/".$adopt->slug) }}">
                                                <img src="{{ asset("images/adopts/".$adopt->image1) }}" class="home-dog-img">
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <h3><a href="{{ url("view/".$adopt->slug) }}">{{ $adopt->name }}</a></h3>
                                            <div class="">{{ $adopt->desc }}</div>
                                        </div>
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
                @foreach($posts as $post)
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0ms">
                        <div class="image">
                            <div class="post-date">25 <span>Feb</span></div>
                            <a href="{{ url("blog/".$post->slug) }}"><img src="{{asset('images/blog/'.$post->image)}}" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <!-- <ul class="news-info">
                                <li>Pets</li>
                                <li>20 comments</li>
                            </ul> -->
                            <h3>
                                <a href="{{url("blog/".$post->slug)}}">{{$post->title}}</a>
                            </h3>
                            <a href="{{url("blog/".$post->slug)}}" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
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
                <div class="title">Adopt your new family member</div>
                <h2>Contact Us</h2>
            </div>

            @include("contact-form")
        </div>
    </section>
    <!--End Appointment Section-->
@endsection