@extends('layouts.app')
@section('title')
تعديل المعلومات الشخصية
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
                    <li class="active"><a href="#" >تعديل بيانات العضوية</a></li>
                </ol>
                {!! Form::model($user, ['url'=>'/user/usereditsitting/'.$user->id, 'method'=>'PATCH']) !!}
                @include('admin.user.form',['showforuser'=>1])

                <div class="form-group clearfix">
                    <div class="col-md-1 col-md-offset-11">
                        <button type="submit" class="btn btn-primary">
                            تنفيذ
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
                <hr>
                <br>
                {!! Form::open(['url'=>'/user/changePassword/'.$user->id  , 'method'=>'POST']) !!}
                {{ csrf_field() }}

                <div class="form-group col-md-12 ">

                    <input id="" type="password" class="form-control" name="password" placeholder="كلمة المرور القديمة">

                </div>
                <div class="form-group col-md-12 ">

                    <input id="" type="password" class="form-control" name="newpassword" placeholder="كلمة المرور الجديدة">

                </div>

                <div class="form-group col-md-2 col-md-offset-10">

                    <button type="submit" class="btn btn-primary">
                        تفيير الرقم السرى
                    </button>

                </div>

                {!! Form::close() !!}

            </div>
            @include('website.bu.bage');
        </div>
    </div>
@endsection
