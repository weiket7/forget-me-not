@extends('template')

@section('content')
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="separator">
                <span class="icon flaticon-pawprint-1"></span>
            </div>
            <h2>Sponsor a dog (or dogs)</h2>
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
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection