@extends('website\layout')

@section('content')

<section id="hero_in" class="contacts">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>Contact &nbsp;Us</h1>
        </div>
    </div>
</section>
<!--/hero_in-->

<div class="contact_info">
    <div class="container">
        <ul class="clearfix">
            <li>
                <i class="pe-7s-map-marker"></i>
                <h4>Address</h4>
                <span>PO Box 97845 Baker st. 567, Los Angeles<br>California - US.</span>
            </li>
            <li>
                <i class="pe-7s-mail-open-file"></i>
                <h4>Email address</h4>
                <span>admission@udema.com - info@udema.com<br><small>Monday to Friday 9am - 7pm</small></span>

            </li>
            <li>
                <i class="pe-7s-phone"></i>
                <h4>Contacts info</h4>
                <span>+ 61 (2) 8093 3402 + 61 (2) 8093 3402<br><small>Monday to Friday 9am - 7pm</small></span>
            </li>
        </ul>
    </div>
</div>
<!--/contact_info-->

<div class="bg_color_1">
    <div class="container margin_120_95">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="map_contact">
                </div>
                <!-- /map -->
            </div>
            <div class="col-lg-6">
                <h4>Send a message</h4>
                <p>Inquiries and technical support and reporting any technical and technical errors on the site.</p>
                <div id="message-contact"></div>
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
               </ul>
               </div>
            @endif
{{-- =================================================== --}}
{!! Form::open(['route'=>['dashboard.message.store'],'method'=>'POST', 'files'=>true]) !!}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <span class="input">
                    {!! Form::text('name', null, ['class'=>'input_field','id'=>'name_contact']) !!}
                                <label class="input_label">
                                    <span class="input__label-content">Your Name</span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-md-6">
                            <span class="input">
                    {!! Form::email('email', null, ['class'=>'input_field', 'id'=>'email_contact']) !!}
                                <label class="input_label">
                                    <span class="input__label-content">Your email</span>
                                </label>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="input">
                    {!! Form::text('phone', null, ['class'=>'input_field', 'id'=>'phone_contact']) !!}
                                <label class="input_label">
                                    <span class="input__label-content">Your telephone</span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <!-- /row -->
                    <span class="input">
                {!! Form::textarea('message', null, ['class'=>'input_field', 'id'=>'message_contact', 'style'=>'hieght:150px;']) !!}
                            <label class="input_label">
                                <span class="input__label-content">Your message</span>
                            </label>
                    </span>
                    <span class="input">
                            <input class="input_field" type="text" id="verify_contact" name="verify">
                            <label class="input_label">
                            <span class="input__label-content">Are you human? 3 + 1 =</span>
                            </label>
                    </span>
                    <p class="add_top_30"><button type="submit" class="btn_1 rounded" id="submit-contact">Send Message</button>
                    </p>

    {!! Form::close() !!}

{{-- =================================================== --}}
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

@endsection
