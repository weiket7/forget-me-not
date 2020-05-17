@extends('template')

@section('content')
    <!--Blog Page Section-->
    <section class="blog-page-section">
        <div class="auto-container">
            <div class="text-center">
                {{ $posts->links() }}
            </div>

            <div class="row clearfix">
                @foreach($posts as $post)
                <!--News Block-->
                <div class="news-block-two col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{ url('blog/'.$post->slug) }}"><img src="{{asset("images/blog/".$post->image)}}" alt="" /></a>
                            <div class="post-date">25 <span>Feb</span></div>
                        </div>
                        <div class="lower-content">
                            {{-- <ul class="post-meta">
                                <li>Pet Care</li>
                                <li>20 Comments</li>
                                <li><span class="icon fa fa-heart"></span> 196</li>
                            </ul> --}}
                            <h3><a href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></h3>
                            <div class="text">{{ $post->shortDesc }}</div>
                            <a href="{{ url('blog/'.$post->slug) }}" class="theme-btn btn-style-eight">read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
    <!--End Blog Page Section-->
@endsection