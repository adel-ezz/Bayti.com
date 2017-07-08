@extends('layouts.app')
@section('title')
  تعديل العقار
    {{ $buinfo->bu_name }}
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
                    <li><a href="{{ url('/user/bulandshowWaiting') }}">عقاراتى</a> </li>
                    <li><a href="#">تعديل العقار</a></li>
                </ol>
                <form class="form-horizontal"  method="POST" action="{{url('/user/create/bulding')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $buinfo->id }}">

                    @include('admin.bu.form',['user'=>1,'bu'=>$buinfo])
                </form>
            </div>
            @include('website.bu.bage');
        </div>
    </div>
@endsection
