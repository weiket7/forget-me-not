@extends('template')

@section('content')
<section class="pets-container">
    <div class="auto-container">
        <div class="row">
            <div class="col-md-6">
                <section class="slider">
                    <div id="petslider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image1) }}" style="max-height: 460px">
                            </li>
                            @if($adopt->image2)
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image2) }}" style="max-height: 460px">
                            </li>
                            @endif
                            @if($adopt->image3)
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image3) }}" style="max-height: 460px">
                            </li>
                            @endif
                            @if($adopt->image4)
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image4) }}" style="max-height: 460px">
                            </li>
                            @endif
                            @if($adopt->image5)
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image5) }}" style="max-height: 460px">
                            </li>
                            @endif
                        </ul>
                    </div>
                    @if(strlen($adopt->image2) > 0 || strlen($adopt->image3) > 0 || strlen($adopt->image4) > 0 || strlen($adopt->image5) > 0)
                    <div id="petcarousel" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image1) }}" style="max-height: 460px">
                            </li>
                            @if($adopt->image2)
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image2) }}" style="max-height: 460px">
                            </li>
                            @endif
                            @if($adopt->image3)
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image3) }}" style="max-height: 460px">
                            </li>
                            @endif
                            @if($adopt->image4)
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image4) }}" style="max-height: 460px">
                            </li>
                            @endif
                            @if($adopt->image5)
                            <li>
                                <img src="{{ asset('images/adopts/'.$adopt->image5) }}" style="max-height: 460px">
                            </li>
                            @endif
                        </ul>
                    </div>
                    @endif

                </section>
            </div>
            <div class="col-md-6 product_detail_side detail_style1">
                <div class="product-heading">
                    <h2>{{ $adopt->name }}</h2>
                </div>

                <ul class="petdetails">
                    <li>Age: <strong>{{ $adopt->age }}</strong></li>
                    <li>Gender: <strong>{{ $adopt->gender == 'M' ? 'Male' : "Female" }}</strong></li>
                    <li>HDB: <strong>{{ $adopt->hdb ? 'Approved' : 'Not Approved'}}</strong></li>
                    @if($adopt->weight)
                        <li>Weight: {{ $adopt->weight }}</li>
                    @endif
                    @if($adopt->sterilise)
                        <li>Sterilised</li>
                    @endif
                    @if($adopt->vaccinate)
                        <li>Vaccinated</li>
                    @endif
                    @if($adopt->microchip)
                        <li>Microchipped</li>
                    @endif
                </ul>

                <div class="adopt-desc">
                    {{$adopt->desc}}
                </div>

                @if($adopt->video)
                    <hr>

                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls>
                            <source src="{{asset("videos/".$adopt->video)}}">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif

                <hr>

                Considering {{ $adopt->name }} as your new family member?
                <br><br>
                Please <a href="https://tinyurl.com/FMNinterestform" target="_blank">fill up this adoption interest form</a>
                and we will contact you once we are available.
            </div>
        </div>
    </div>
</section>

@endsection