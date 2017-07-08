@extends('layouts.app')
@section('title')
   هذاالعقار غير مفعل
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

                </ol>
             <div class=" alert alert-danger">
                 هذا العقار فى انتظار الموافقة من قبل الإداره بحد أقصى 24 ساعة
             </div>
            </div>
            @include('website.bu.bage');
        </div>
    </div>
@endsection
