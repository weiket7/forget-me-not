@extends('template')

@section('content')
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="separator">
                <span class="icon flaticon-pawprint-1"></span>
            </div>
            <div class="title">Aopt your new family member</div>
            <h2>Contact Us</h2>
        </div>

        @include("contact-form")
    </div>
@endsection