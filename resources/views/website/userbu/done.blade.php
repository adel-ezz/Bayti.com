@extends('layouts.app')
@section('title')
  تم إضافة العقار بنجاح
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
                    <li><a href="">    تم إضافة العقار بنجاح</a></li>

                </ol>
              <div class="alert alert-success">
                  تم إضافة العقار بنجاح
              </div>
            </div>
            @include('website.bu.bage');
        </div>
    </div>
@endsection
