@extends('layouts.app')
@section('title')
خيارات العقار
@endsection

@section('header')


    <link rel="stylesheet" href="/custmer/buall.css">


@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li><a href="{{ url('/showAllbu') }}">كل العقارات</a></li>
                    <li><a href="{{ url('/singleBu/'.$buInfo->id) }}">{{  $buInfo->bu_name }}</a></li>
                </ol>

                <div class="">
                    <div class="btn-group">
                <a class="btn btn-default" href="{{ url('/search?bu_price='.$buInfo->bu_price) }}">
                    السعر:
                    {{ $buInfo->bu_price }}</a>
                        <a class="btn btn-default" href="{{ url('/search?bu_place='.$buInfo->bu_place) }}">
                    الموقع:
                            {{  bu_place()[$buInfo->bu_place]  }}</a>
                        <a class="btn btn-default" href="{{ url('/search?bu_square='.$buInfo->bu_square) }}">
                    المساحة:
                            {{ $buInfo->bu_square}}</a>
                        <a class="btn btn-default" href="{{ url('/search?bu_rooms='.$buInfo->bu_rooms) }}">
                    عدد الغرف:
                            {{ $buInfo->bu_rooms }} </a>
                        <a class="btn btn-default" href="{{ url('/search?bu_rent='.$buInfo->bu_rent) }}">
                    نوع العملية:
                            {{  bu_rent()[$buInfo->bu_rent] }}</a>
                        <a class="btn btn-default" href="{{ url('/search?bu_type='.$buInfo->bu_type) }}">
                    نوع العقار:
                            {{ bu_type()[$buInfo->bu_type] }}</a>
                        <br>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59185ea995a35641"></script>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>

                    </div>

                    <hr>
                    <img class="main_im" src="{{ checkifinageisexist($buInfo->image) }}">
                    <hr>
                    <p>

                        {!! nl2br($buInfo->bu_large_dis ) !!}</p>
                    <br>

                    <div id="map" style="width:100%;height:350px"></div>
                </div>
                <hr>
                <h3>عقارات أخرى قد تهمك</h3>
                <hr>
                <div class="profile-content">
                    @include('website.bu.sharefile',['bu'=>$same_rent])
                    @include('website.bu.sharefile',['bu'=>$same_type])
                </div>
            </div>
            @include('website.bu.bage');
        </div>
    </div>
@endsection
@section('footer')



    <script>
        function myMap() {
            var mapCanvas = document.getElementById("map");
            var myCenter = new google.maps.LatLng({{ $buInfo->bu_langitude }},{{ $buInfo->bu_latitude }});
            var mapOptions = {center: myCenter, zoom: 5};
            var map = new google.maps.Map(mapCanvas,mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0dieyjeQlvzT1XXSvoa9LRJ4WsAHcNSg&callback=myMap"></script>
@endsection