@extends('admin.layouts.layout')
@section('title')
    تعديل العقار
    {{ $bu->bu_name }}
@endsection

@section('header')

@endsection





@section('content')






    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            التعديل على العقار
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminbannel')}}"><i class="fa fa-dashboard"></i> الرئسية </a></li>
            <li><a href="{{url('/adminbannel/bu')}}">التحكم فى العقارات</a></li>
            <li><a href="{{url('/adminbannel/bu/edit')}}">تعديل العقار{{ $bu->bu_name }} </a></li>
        </ol>
    </section>




    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-10">
                            @if($user=='')
                                {
                                <p>تمت إضافة العقار بواسطة زائر</p>
                                }
                            @else

                                <p>
                                    إسم المستخدم:
                             {{ $user->name }}
                                </p>
                                <p>الإيميل:
                                    {{ $user->email }}
                                </p>
                                <p>الصلاحية:
                                    @if($user->admin==1)
                                        مدير
                                    @else
                                        عضو او زائر
                                    @endif
                                </p>

                                <p>
                                    <a href="{{ url('/adminbannel/users/'.$user->id.'/edit') }}">                                     المزيد...........
                                    </a>
                                </p>

                            @endif
                        </div>
                        <label for="bu_price" class="col-md-2 control-label">معلومات صاحب العقار</label>
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">تعديل {{ $bu->bu_name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {{--<form class="form-horizontal" role="form" method="POST" action="{{url('/adminbannel/users/'. $user->id )}}">--}}
                        {{--{!! Form::model($user ,['route'=>['adminbannel.users.update', $user->id ] ,'method' =>'PATCH' ]) !!}--}}
                        {!! Form::model($bu, ['url'=>'adminbannel/bu/'.$bu->id , 'method'=>'PATCH','files'=>true]) !!}
                        @include('admin.bu.form')



                        {!! Form::close() !!}
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
















@section('footer')


@endsection