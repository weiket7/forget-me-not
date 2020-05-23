@extends('template')

@section('content')
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="separator">
                <span class="icon flaticon-pawprint-1"></span>
            </div>
            <h2>{{ $page['title'] }}</h2>
        </div>
        <div class="row clearfix">
            <div class="image-column col-md-6 col-sm-12 col-xs-12">
                <div class="image">
                    <img src="{{ asset("images/".$page['image']) }}">
            </div>
                </div>
                <div class="content-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        {{-- <h2>{{$featuredPost->title}}</h2> --}}

                        {!! nl2br($page['content']) !!}
                        <br><br>

                        <div class="row">
                            <div class="services-block col-xs-12">
                                <div class="inner-box">
                                    <h3>
                                        To donate, please:
                                        <br><br>
                                        1. Bank transfer to OCBC Current Account: 594-457574-001<br>
                                        2. Or PayNow to UEN 201935650D
                                        <img src="{{asset("images/donate-paynow-forget-me-not.jpg")}}" style="max-height: 200px;"></img>
                                        <br>
                                        <small>(screenshot from OCBC app)</small>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection