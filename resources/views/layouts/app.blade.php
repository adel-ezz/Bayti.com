<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


{!! Html::style('website/css/bootstrap.min.css') !!}
<!-- <link href="website/css/bootstrap.min.css" rel="stylesheet" /> -->
{!! Html::style('website/css/flexslider.css') !!}
<!-- <link href="website/css/flexslider.css" rel="stylesheet" /> -->
{!! Html::style('website/css/style.css') !!}

<!-- <link href="website/css/style.css" rel="stylesheet" /> -->
{!! Html::style('website/css/font-awesome.min.css') !!}
<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    {!! Html::script('website/js/jquery.min.js') !!}
    <link rel="stylesheet" href="/custmer/css/select2.min.css">

    <!--   <script src="website/js/jquery.min.js"></script> -->
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet'
          type='text/css'>


    <title>
        {{ getsetting() }}
        @yield('title')

    </title>

    <!-- Styles -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 -->
    <!-- Scripts -->
<!--  <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script> -->
    @yield('header')
</head>
<body>
<div id="app" style="direction: rtl">
    <div class="header">
        <div class="container"><a class="navbar-brand pull-right" href="{{url('/')}}"><i class="fa fa-paper-plane"></i>
                {{ getsetting() }}</a>
            <div class="menu pull-left"><a class="toggleMenu" href="#"><img
                            src="{{ Request::root() }}/website/images/nav_icon.png" alt=""/> </a>
                <ul class="nav" id="nav">
                    <li class="{{ Request::is('/') ? 'current' :'' }}"><a href="{{url('/')}}">الرئيسية</a></li>
                    <li class="{{  Request::is('/showAllbu')? 'current' : '' }}"><a href="{{ url('/showAllbu') }}">كل
                            العقارات</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            إيجار <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            @foreach( bu_type() as $key=>$type)
                                <li><a href="{{ url('/search?bu_rent=0&bu_type='.$key) }}">{{ $type }}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            تمليك <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @foreach( bu_type() as $key=>$type)
                                <li><a href="{{ url('/search?bu_rent=1&bu_type='.$key ) }}">{{ $type }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/contact">إتصل بنا</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                        <li><a href="{{ route('register') }}">تسجيل عضوية جديدة</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل الخروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li class="{{ Request::is('user/usereditsitting') ?'active':'' }}">
                                    <a href="{{ url('/user/usereditsitting') }}">
                                        <i class="fa fa-edit"></i>
                                        تعديل المعلومات الشخصية </a>
                                </li>
                                <li class="{{ Request::is('user/bulandshow') ?'active':'' }}">
                                    <a href="/user/bulandshow">
                                        <i class="fa fa-check"></i>
                                        عقاراتى المفعلة </a>
                                </li>
                                <li class="{{ Request::is('user/bulandshowWaiting') ?'active':'' }}">
                                    <a href="/user/bulandshowWaiting">
                                        <i class="fa fa-clock-o"></i>
                                        عقاراتى فى إنتظار التغعيل </a>
                                </li>
                                <li class="{{ Request::is('user/create/bubuild') ?'active':'' }}">
                                    <a href="/user/create/bubuild">
                                        <i class="fa fa-plus"></i>
                                        أضف عقار </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <div class="clear"></div>
                </ul>
            </div>
        </div>
    </div>

    @include('layouts.message');

    @yield('content')
</div>

<!-- Scripts -->
<div class="footer">
    <div class="footer_bottom">
        <div class="follow-us">
            <a class="fa fa-facebook social-icon" href="{{ getsetting( "face" ) }}"></a>
            <a class="fa fa-linkedin social-icon" href="{{ getsetting( "linkedIn" ) }}"></a>
            <a class="fa fa-github social-icon" href="{{ getsetting( "github" ) }}"></a>
        </div>
        <div class="copy">
            <p>{{ getsetting('footer') }} @ {{ date('Y') }}
            </p>
        </div>
    </div>
</div>

{!! Html::script('website/js/bootstrap.min.js') !!}
{!! Html::script('website/js/jquery.flexslider.js') !!}
{!! Html::script('website/js/responsive-nav.js') !!}
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script src="/custmer/js/select2.min.js"></script>
<script type="text/javascript">
    $('.select2').select2({
        dir: "rtl"
    });
</script>
@yield('footer')
</body>
</html>
