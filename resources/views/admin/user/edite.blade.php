@extends('admin.layouts.layout')
@section('title')
    تعديل العضو
    {{ $user->name }}
@endsection

@section('header')

@endsection





@section('content')






    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            التعديل على العضو
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminbannel')}}"><i class="fa fa-dashboard"></i> الرئسية </a></li>
            <li><a href="{{url('/user')}}">التحكم فى الأعضاء</a></li>
            <li><a href="{{url('/adminbannel/users/edit')}}">تعديل العضو{{ $user->name }} </a></li>
        </ol>
    </section>





        <!-- Main content -->

            <section class="content">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">تعديل {{ $user->name }}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                {{--<form class="form-horizontal" role="form" method="POST" action="{{url('/adminbannel/users/'. $user->id )}}">--}}
                                {{--{!! Form::model($user ,['route'=>['adminbannel.users.update', $user->id ] ,'method' =>'PATCH' ]) !!}--}}
                                {!! Form::model($user, ['url'=>'adminbannel/users/'.$user->id , 'method'=>'PATCH']) !!}
                                @include('admin.user.form')

                                <div class="form-group clearfix">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            تنفيذ
                                        </button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                                <br/>
                                {!! Form::open(['url'=>'adminbannel/users/changePassword' , 'method'=>'POST']) !!}
                                <input type="hidden" value="{{ $user->id }}" name="user_id">

                                <div class="form-group col-md-12">

                                    <input id="" type="password" class="form-control" name="" placeholder="كلمة المرور">

                                </div>

                                <div class="form-group col-md-12 text-center">

                                    <button type="submit" class="btn btn-primary">
                                        تفيير الرقم السرى
                                    </button>

                                </div>

                                {!! Form::close() !!}

                                {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                {{--تسجيل عضوية جديدة--}}
                                {{--</button>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</form>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active pull-right"><a href="#activity" data-toggle="tab" aria-expanded="true">عقارات مفعلة</a></li>
                                <li class="pull-right"><a href="#timeline" data-toggle="tab" aria-expanded="false">عقارات غير مغعلة</a></li>

                            </ul>
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="tab-pane active" id="activity">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="text-center">إسم العقار</td>
                                            <td class="text-center">أضيف فى</td>
                                            <td class="text-center">سعر العقار</td>
                                            <td class="text-center"> نوع العقار</td>
                                            <td class="text-center">مكان العقار</td>
                                            <td class="text-center">تحكم</td>
                                        </tr>

                                        @foreach($buenable as $buenables)
                                            <tr>
                                                <td class="text-center"><a href="/adminbannel/bu/{{ $buenables->id }}/edit"> {{ $buenables->bu_name }}</a></td>
                                                <td class="text-center">{{ $buenables->created_at }}</td>
                                                <td class="text-center">{{ $buenables->bu_price }}</td>
                                                <td class="text-center">{{ bu_type()[$buenables->bu_type] }}</td>
                                                <td class="text-center">{{ bu_place()[$buenables->bu_place] }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('/adminbannel/change_status/' . $buenables->id . '/0') }}" class="btn btn-primary">إلغاء التفعيل</a>
                                                    <a href="{{ url('/adminbannel/bu/' . $buenables->id . '/edit') }}" class="btn btn-primary">تعديل</a>
                                                    <a href="{{ url('/adminbannel/bu/' . $buenables->id . '/delete' ) }}" class="delete btn btn-danger">مسح</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane " id="timeline">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="text-center">إسم العقار</td>
                                            <td class="text-center">أضيف فى</td>
                                            <td class="text-center">سعر العقار</td>
                                            <td class="text-center"> نوع العقار</td>
                                            <td class="text-center">مكان العقار</td>
                                            <td class="text-center">تحكم</td>
                                        </tr>

                                        @foreach($buwaiting as $buwaitingg)
                                            <tr>
                                                <td class="text-center"><a href="/adminbannel/bu/{{ $buwaitingg->id }}/edit"> {{ $buwaitingg->bu_name }}</a></td>
                                                <td class="text-center">{{ $buwaitingg->created_at }}</td>
                                                <td class="text-center">{{ $buwaitingg->bu_price }}</td>
                                                <td class="text-center">{{ bu_type()[$buwaitingg->bu_type] }}</td>
                                                <td class="text-center">{{ bu_place()[$buwaitingg->bu_place] }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('/adminbannel/change_status/' . $buwaitingg->id . '/1') }}" class="btn btn-primary">تفعيل</a>
                                                    <a href="{{ url('/adminbannel/bu/' . $buwaitingg->id . '/edit') }}" class="btn btn-primary">تعديل</a>
                                                    <a href="{{ url('/adminbannel/bu/' . $buwaitingg->id . '/delete' ) }}" class="delete btn btn-danger">مسح</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                </div>
            </section>





@endsection
















@section('footer')
    <!-- DataTables -->

@endsection