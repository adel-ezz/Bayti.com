@extends('admin.layouts.layout')
@section('title')
    رسائل الموقع
@endsection

@section('header')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->

    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap.css">

@endsection


@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            التحكم فى رسائل الموقع
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('adminbannel')}}"><i class="fa fa-dashboard"></i> الرئسية </a></li>
            <li class="active"><a href="{{url('user')}}">التحكم فى الأوضاع</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">الأعضاء</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="pull-right">#</th>
                                <th class="text-center">الإسم</th>
                                <th class="text-center">البريد الإلكترونى</th>
                                <th class="text-center">إضيف فى</th>
                                <th class="text-center">الهدف</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr class="text-center">
                                    <td class="text-center">{{ $message->id }}</td>
                                    <td class="text-center"> <a href="{{ url('/adminbannel/contact/' . $message->id . '/edit') }}"> {{ $message->contact_name }}</a></td>
                                    <td class="text-center">{{ $message->contact_email }}</td>
                                    <td class="text-center">{{ $message->created_at }}</td>
                                    <td class="text-center">{{ contact()[$message->contact_type] }}</td>
                                    <td class="text-center">{{ $message->view==1 ? 'رسالة قديمة' : 'رسالة جديدة' }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/adminbannel/contact/' . $message->id . '/edit') }}">edite</a>
                                        <a href="{{ url('/adminbannel/contact/' . $message->id . '/delete' ) }}"
                                           class="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="pull-right">#</th>
                                <th class="text-center">الإسم</th>
                                <th class="text-center">البريد الإلكترونى</th>
                                <th class="text-center">إضيف فى</th>
                                <th class="text-center">الهدف</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            </tfoot>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection


@section('footer')


    <!-- DataTables -->

    <!-- jQuery 2.2.3 -->
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- DataTables -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>


@endsection