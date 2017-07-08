@extends('layouts.app')
@section('title')
  إضافة عقار جديد
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
                    <li><a href="{{ url('/user/create/bubuild') }}">إضافة عقار جديد</a></li>
                </ol>
                <form class="form-horizontal"  method="POST" action="{{url('/user/create/bubuild')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                @include('admin.bu.form',['user'=>1])
                </form>
            </div>
            @include('website.bu.bage');
        </div>
    </div>
@endsection
