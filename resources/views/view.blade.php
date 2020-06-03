@extends('template')

@section('content')
    <div class="auto-container">
        <div class="row">
            <div class="col-md-5">
                <div class="full">
                    <div class="thumb_product_slider">
                        <div class="item"><img src="{{asset('images/adopts/'.$adopt->image)}}"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 product_detail_side detail_style1">
                    <div class="product-heading">
                        <h2>{{ $adopt->name }}</h2>
                    </div>

                    <ul class="petdetails">
                        <li>Age: <strong>{{ $adopt->age }}</strong></li>
                        <li>Gender: <strong>{{ $adopt->gender == 'M' ? 'Male' : "Female" }}</strong></li>
                        <li>HDB: <strong>{{ $adopt->hdb ? 'Approved' : 'Not Approved'}}</strong></li>
                        @if($adopt->sterilise)
                            <li>Sterilised</li>
                        @endif
                        @if($adopt->vaccinate)
                            <li>Vaccinated</li>
                        @endif
                        @if($adopt->microchip)
                            <li>Microchippped</li>
                        @endif
                    </ul>
                    
                    <div class="adopt-desc">
                        {{$adopt->desc}}
                    </div>
                    
                    <hr>

                    Considering {{ $adopt->name }} as your new family member?
                    <br><br>
                    Please <a href="https://tinyurl.com/FMNinterestform" target="_blank">fill up this adoption interest form</a> and we will contact you once we are available.
            </div>
        </div>
    </div>

@endsection