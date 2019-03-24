@extends('layouts.app')

@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ route('password.request') }}">Forgot password?</a></div>
                </div>


                <div class="clear" style ="border: 2px; padding: 20px "></div>


                <div style="padding-bottom:20px"  class="form-group">

                    <div class="col-md-offset-1 col-md-9">
            
                        <a class="btn btn-block btn-social btn-twitter" href="{{ url('/auth/twitter') }}" ><span class="fa fa-twitter"></span> Sign in with Twitter</a>
                        <a class="btn btn-block btn-social btn-facebook" href="{{ url('/auth/facebook') }}" ><span class="fa fa-facebook"></span> Sign in with Facebook</a>
                    </div>

                </div>
                <div class="clear" style ="border-bottom: 1px solid #888; padding: 20px "></div>

                <div style="padding-bottom:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            </div>



                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">

                                <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign In</button>


                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account!
                                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                </div>
                <div class="clear" style ="border: 2px; padding: 20px "></div>

                <div style="padding-bottom:20px"  class="form-group">


                    <div class="col-md-offset-1 col-md-9">
                        <a class="btn btn-block btn-social btn-twitter" href="{{ url('/auth/twitter') }}" ><span class="fa fa-twitter"></span> Sign Up with Twitter</a>
                        <a class="btn btn-block btn-social btn-facebook" href="{{ url('/auth/facebook') }}" ><span class="fa fa-facebook"></span> Sign Up with Facebook</a>
                    </div>

                </div>
                <div class="clear" style ="border-bottom: 1px solid #888; padding: 20px "></div>


                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>



                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                               <input id="email" type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">UserName</label>
                            <div class="col-md-9">
                                <input id="name" type="text" placeholder="UserName" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Confirm Password</label>
                            <div class="col-md-9">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                              
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    You already have an account!
                                    <a href="#" onClick="$('#signupbox').hide(); $('#loginbox').show()">
                                        Sign in Here
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>




        </div>
    </div>

@endsection