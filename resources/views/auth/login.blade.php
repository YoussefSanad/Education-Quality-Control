@extends('layouts.auth')

@section('content')
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <span class="contact100-form-title">
					Login
				</span>


                <div class="wrap-input100 validate-input {{ $errors->has('email') ? ' has-error' : '' }}" data-validate="E-mail is required">
                    <label class="label-input100" for="email">E-mail</label>
                    <input id="email" class="input100" type="email" name="email" placeholder="Enter your email...">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="label-input100" for="password">Password</label>
                    <input id="password" class="input100" type="password" name="password" placeholder="Enter your password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <span class="focus-input100"></span>
                </div>


                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="submit">
                        Login
                    </button>
                </div>
                <br>
                <div class="text-center">
                    OR
                </div>
                <div class="container-contact100-form-btn">
                    <a href="{{ route('register') }}">
                        Register
                    </a>
                </div>

                <div class="contact100-form-social flex-c-m">
                    <a href="#" class="contact100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="contact100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="contact100-form-social-item flex-c-m bg3">
                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

            <div class="contact100-more flex-col-c-m" style="background-image: url({{asset('img/bg-01.jpg')}});">
            </div>
        </div>
    </div>



@endsection




{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                OR
                                <button class="btn btn-success">
                                    <a href="{{ route('register') }}">Register</a>
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}