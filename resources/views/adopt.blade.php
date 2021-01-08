@extends('template')

@section('content')
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="separator">
                <span class="icon flaticon-pawprint-1"></span>
            </div>
            <h2>Dogs for Adoption</h2>
        </div>

        <div class="row clearfix">
            @foreach($adopts as $adopt)
            <div class="product-block col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="{{ url('view/'.$adopt->slug ) }}" class='adopt-img-container'>
                            <img src="{{asset('images/adopts/'.$adopt->image1)}}" class="adopt-img" />
                        </a>
                    </div>

                    <div class="lower-content">
                        <div class="title">{{ $adopt->breed }}</div>
                        <h3><a href="{{ url('view/'.$adopt->slug ) }}">{{ $adopt->name }}</a></h3>
                        <div>
                            {{ $adopt->gender == 'M' ? 'Male' : "Female" }}
                            <br>{{ $adopt->age }}
                            <br>{{ $adopt->hdb ? 'HDB Approved' : 'Not HDB Approved'}}
                         </div>
                        <a href="{{ url('view/'.$adopt->slug ) }}" class="btn-view theme-btn btn-style-eight">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection