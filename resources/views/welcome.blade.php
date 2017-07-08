@extends('layouts.app')
@section('title')
    | الرئيسية
@endsection

@section('header')
    <link rel="stylesheet" href="/main/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="/main/css/style.css"> <!-- Resource style -->
    <script src="/main/js/modernizr.js"></script> <!-- Modernizr -->
@endsection
@section('content')
    <div class="banner text-center" style="background: url({{checkifinageisexist( getsetting('main_slider') )}}) no-repeat center">
        <div class="container">
            <div class="banner-info">
                <h1>أهلا بك فى موقع {{ getsetting() }} </h1>
                    <br>
                <div class="row main_search">
                    {!! Form::open(['url'=> 'search', 'method'=> 'get']) !!}

                    <div class="col-md-3">
                        {!! Form::text("bu_price_from",null,['class'=>'form-control ','placeholder'=>'سعر العقار من..... ']) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::text("bu_price_to",null,['class'=>'form-control','placeholder'=>'سعر العقار إلى.....']) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select("bu_rooms",roomsnumber(),null,['class'=>'form-control','placeholder'=>'عدد الغرف']) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select("bu_place",bu_place(),null,['class'=>'form-control select2','placeholder'=>'المكان']) !!}
                    </div>

                </div>
                <br>
                <div class="row main_search">
                    <div class="col-md-3">
                        {!! Form::submit("ابحث",['class'=>'btn btn-success topSearch-btn']) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select("bu_type",bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select("bu_rent",bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع العملية']) !!}
                    </div>

                    <div class="col-md-3">
                        {!! Form::text("bu_square",null,['class'=>'form-control','placeholder'=>'المساحة']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>

                <a class="banner_btn" href="{{ url('/user/create/bubuild') }}">أضف عقار بدون اى قيود</a></div>
        </div>
    </div>
    <div class="main">
        <ul class="cd-items cd-container">
            @foreach(\App\Bu::where('bu_status',1)->get() as $bu)
            <li class="cd-item">
                <img class="acar-image" src="{{ checkifinageisexist($bu->image)}}" alt="{{ $bu->name }}" title="{{ $bu->name }}">
                <a href="#prdct1" data-id="{{ $bu->id }}" class="cd-trigger">نبذه سريعة</a>
                <div class="quick-view-content">
                    <div class="quick-view-content-wrapper">
                        <div class="cd-slider-wrapper">
                            <ul class="cd-slider">
                                <li><img class="overlay" src="{{ checkifinageisexist($bu->image)}}" alt="Product 1"></li>
                            </ul> <!-- cd-slider -->
                        </div> <!-- cd-slider-wrapper -->
                        <div class="cd-item-info">
                            <h2 class="titlebox"></h2>
                            <p class="disbox"></p>
                            <ul class="cd-item-action">
                                <li><a href="" class="add-to-cart pricebox"></a></li>
                                <li><a href="" class="morebox">المذيد</a></li>
                            </ul> <!-- cd-item-action -->
                        </div> <!-- cd-item-info -->
                    </div>
                </div>
            </li> <!-- cd-item -->
            @endforeach
        </ul> <!-- cd-items -->

        <div id="cd-quick-view" class="cd-quick-view">
            <a href="javascript:void(0);" class="cd-close">Close</a>
        </div> <!-- cd-quick-view -->

        <div id="cd-quick-view-coverlay"></div>
    </div>
@endsection
@section('footer')

    <script src="/main/js/velocity.min.js"></script>
    <script>
        function urlHome()
        {
            return '{{ Request::root() }}';
        }
        function getnoimage() {
            return '{{ getsetting('noimage') }}';
        }
    </script>
    <script src="/main/js/main.js"></script> <!-- Resource jQuery -->
@endsection
