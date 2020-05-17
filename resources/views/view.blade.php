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

                    {{ $adopt->gender == 'M' ? 'Male' : "Female" }}
                    <br>{{ $adopt->age }}
                    <br>{{ $adopt->hdb ? 'HDB Approved' : 'Not HDB Approved'}}

                    <div class="adopt-desc">
                        {{$adopt->desc}}
                    </div>
                    
                    <hr>

                    Considering {{ $adopt->name }} as your new family member? Please share with us your contact information and why you would like to adopt {{ $adopt->name }}. We will contact you once we are available.
                    <br><br>
                    
                    <div class="default-form">
                        <div class="form-box">
                            <form method="post" action="{{url("contact-us")}}">
                                {{csrf_field()}}
                                <a name="contact"></a>
                                <a id="contact"></a>
                                <div class="row clearfix">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name" value="" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="mobile" value="" placeholder="Mobile">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" value="" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Message" name="message"></textarea>
                                    </div>
                                    <div class="form-group text-center col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="theme-btn btn-style-two">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection