@extends('layouts.app')

@section('content')


    <section id="section-contact" style="margin-top: 6%;" class="page-section">

        <div class="heading-block title-center">
            <h2>Get in Touch with us</h2>
            <span>Still have Questions? Contact Us using the Form below.</span>
        </div>

        <div class="container clearfix">

            <!-- Contact Form
            ============================================= -->
            <div class="container">

                <h1>Contact US Form</h1>


                @if(Session::has('success'))

                    <div class="alert alert-success">

                        {{ Session::get('success') }}

                    </div>

                @endif

                <div class="col_full">

                    <div class="fancy-title title-dotted-border">
                        <h3>Send us an Email</h3>
                    </div>

                    <div class="contact-form-result"></div>




                    {!! Form::open(['route'=>'contactus.store']) !!}

                    <div class="form-process"></div>


                    <div class="col_one_third {{ $errors->has('name') ? 'has-error' : '' }}">

                        {!! Form::label('Name:') !!}

                        {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}

                        <span class="text-danger">{{ $errors->first('name') }}</span>

                    </div>


                    <div class="col_one_third {{ $errors->has('phone') ? 'has-error' : '' }}">

                        {!! Form::label('Phone:') !!}

                        {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'Enter Phone']) !!}

                        <span class="text-danger">{{ $errors->first('phone') }}</span>

                    </div>

                    <div class="col_one_third col_last {{ $errors->has('email') ? 'has-error' : '' }}">

                        {!! Form::label('Email:') !!}

                        {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}

                        <span class="text-danger">{{ $errors->first('email') }}</span>

                    </div>


                    <div class="clear"></div>


                    <div class="col_two_third {{ $errors->has('subject') ? 'has-error' : '' }}">

                        {!! Form::label('Subject:') !!}

                        {!! Form::text('subject', old('subject'), ['class'=>'form-control', 'placeholder'=>'Enter Subject']) !!}

                        <span class="text-danger">{{ $errors->first('subject') }}</span>

                    </div>


                    <div class="col_one_third col_last {{ $errors->has('department') ? 'has-error' : '' }}">

                        {!! Form::label('Department:') !!}

                        {!! Form::select('department', ['A','B','C'], ['class'=>'form-control']) !!}

                        <span class="text-danger">{{ $errors->first('department') }}</span>

                    </div>


                    <div class="clear"></div>


                    <div class="col_full {{ $errors->has('message') ? 'has-error' : '' }}">

                        {!! Form::label('Message:') !!}

                        {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}

                        <span class="text-danger">{{ $errors->first('message') }}</span>

                    </div>


                    <div class="col_full hidden">
                        <input type="text" id="botcheck" name="botcheck" value="" class="sm-form-control">
                    </div>

                    <div class="col_full">

                        <button class="button button-3d nomargin">Contact US!</button>

                    </div>


                    {!! Form::close() !!}




                </div>

                <!-- Contact Form End -->

                <!-- Contact Info
                ============================================= -->
                <div class="col_full nobottommargin clearfix">
                    <div class="col_one_third">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-phone3"></i></a>
                            </div>
                            <h3>Speak to Us<span class="subtitle">(20) 11456 7890</span></h3>
                        </div>
                    </div>

                    <div class="col_one_third">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-instagram2"></i></a>
                            </div>
                            <h3>Follow on Instagram<span class="subtitle">123K Followers</span></h3>
                        </div>
                    </div>

                    <div class="col_one_third col_last">
                        <div class="feature-box fbox-center fbox-bg fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-facebook"></i></a>
                            </div>
                            <h3>Follow on Facebook<span class="subtitle">244K Followers</span></h3>
                        </div>
                    </div>

                </div><!-- Contact Info End -->

            </div>
        </div>

    </section>


@endsection