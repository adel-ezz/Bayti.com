@extends('layouts.app')
@section('title')
    -تسجيل الدخول
@endsection
@section('content')
<div class="container">
    <div class="contact_bottom">
        <h3>تسجيل الدخول</h3>
         <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="contact-to">
                <div class="text2 {{ $errors->has('password') ? ' has-error' : '' }}">

                    <div class="col-md-6 col-mg-offset-12">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="text2 {{ $errors->has('email') ? ' has-error' : '' }}">
                    

                    <div class="col-md-6 col-mg-offset-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="text2">
                    <div class="col-md-12 col-mg-offset-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" style="float: right; margin-left: 10px;" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرنى
                            </label>
                        </div>
                    </div>
                </div>

                <div class="text2">
                    <div class="col-md-12 col-mg-offset-12 ">
                        <button type="submit" class="btn btn-primary">
                            تسجيل دخول
                        </button>

                        <a class="banner_btn" href="{{ route('password.request') }}">
                            نسيت كلمة المرور؟
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <br>
</div>

@endsection
