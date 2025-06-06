<div class="default-form">
    <div class="form-box">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{url("contact-us")}}">
            {{csrf_field()}}
            <a name="contact"></a>
            <div class="row clearfix">
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" value="" placeholder="Name *">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="mobile" value="" placeholder="Mobile *">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input type="email" name="email" value="" placeholder="Email *">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="subject" value="" placeholder="Subject *">
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <textarea placeholder="Message *" name="message"></textarea>
                    <small>All fields are required</small>
                </div>


                <div class="form-group text-center col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="theme-btn btn-style-two">Send request</button>
                </div>

                <div class="form-group text-center col-md-12 col-sm-12 col-xs-12">
                
                    @if(session('error'))
                    <div class="alert alert-danger">
                            {{ session('error')}}
                        </div>
                    @endif
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success')}}
                        </div>
                    @endif
                </div>

            </div>
        </form>
    </div>
</div>