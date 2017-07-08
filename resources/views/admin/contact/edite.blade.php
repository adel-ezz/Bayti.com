@extends('admin.layouts.layout')
@section('title')
    تعديل الرسالة
    {{ $contact->contact_name }}
@endsection

@section('header')

@endsection





@section('content')






    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           التعديل على الرسالة
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminbannel')}}"><i class="fa fa-dashboard"></i> الرئسية </a></li>
            <li><a href="{{url('/contact')}}">التحكم فى الرسالة</a></li>
            <li><a href="{{url('/adminbannel/contact/'.$contact->id.'edit')}}">تعديل الرسالة{{ $contact->contact_name  }} </a></li>
        </ol>
    </section>




    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل {{ $contact->contact_name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {{--<form class="form-horizontal" role="form" method="POST" action="{{url('/adminbannel/users/'. $user->id )}}">--}}
                        {{--{!! Form::model($user ,['route'=>['adminbannel.users.update', $user->id ] ,'method' =>'PATCH' ]) !!}--}}
                        {!! Form::model($contact, ['url'=>'adminbannel/contact/'.$contact->id , 'method'=>'PATCH']) !!}

                        @include('admin.contact.form')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                 تنفيذ
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
















@section('footer')
    <!-- DataTables -->

@endsection