@extends('template')

@section('content')
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side / Blog Single-->
            <div class="content-side col-xs-12">
                <div class="blog-single padding-right">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset("images/blog/".$blog->image) }}" alt="" />
                        </div>
                        <div class="lower-content">
                            <div class="title-box">
                                <div class="date-box">25 <span>Feb</span></div>
                                <h3>{{ $blog->title }}</h3>
                                <ul class="post-meta">
                                    <li>{{ $blogTypes[$blog->type] }}</li>
                                    {{-- <li>20 Comments</li>
                                    <li><span class="icon fa fa-heart"></span> 196</li> --}}
                                </ul>
                            </div>
                            <div class="text">
                               {!! nl2br($blog->content) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection