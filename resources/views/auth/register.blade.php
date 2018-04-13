@extends('layouts.auth')

@section('content')
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <span class="contact100-form-title">
					Register
				</span>

                <div class="wrap-input100 validate-input {{ $errors->has('name') ? ' has-error' : '' }}" data-validate="Name is required">
                    <label class="label-input100" for="name">Name</label>
                    <input id="name" class="input100" type="text" name="name" placeholder="Enter your name...">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <span class="focus-input100"></span>
                </div>

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

                <div class="form-group wrap-input100 validate-input">
                    <label class="label-input100" for="password-confirm">Confirmation Password</label>
                    <input id="password-confirm" class="input100" type="password" name="password_confirmation" placeholder="Enter your password">
                    <span class="focus-input100"></span>
                </div>


                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="submit">
                        Register
                    </button>
                </div>
                <br>
                <div class="text-center">
                    OR
                </div>
                <div class="container-contact100-form-btn">
                    <a href="{{ route('login') }}">Login</a>
                </div>


            </form>

            <div class="contact100-more flex-col-c-m" style="background-image: url({{asset('img/bg-01.jpg')}});">
            </div>
        </div>
    </div>
@endsection

