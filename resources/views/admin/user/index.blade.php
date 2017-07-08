@extends('admin.layouts.layout')
@section('title')
    التحكم فى الأعضاء
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
            التحكم فى الأعضاء
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
                                <th class="text-center">إسم المستخدم</th>
                                <th class="text-center">البريد الإلكترونى</th>
                                <th class="text-center">تاريخ التسجيل</th>
                                <th class="text-center">عقاراتى</th>
                                <th class="text-center">نوع العضوية</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $userinfo)
                                <tr class="text-center">
                                    <td class="text-center">{{ $userinfo->id }}</td>
                                    <td class="text-center"> {{ $userinfo->name }}</td>
                                    <td class="text-center">{{ $userinfo->email }}</td>
                                    <td class="text-center">{{ $userinfo->created_at }}</td>
                                    <th class="text-center"><a class="btn btn-danger" href="{{ url('/adminbannel/bu/'. $userinfo->id) }}"><i class="fa fa-link"></i> </a> </th>
                                    <td class="text-center"> {{ $userinfo->admin==1 ? 'مدير' : 'عضو' }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/adminbannel/users/' . $userinfo->id . '/edit') }}">edite</a>
                                        @if($userinfo->admin!=1)
                                            <a href="{{ url('/adminbannel/users/' . $userinfo->id . '/delete' ) }}"
                                               class="delete">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <th class="text-center">#</th>
                            <th class="text-center">إسم المستخدم</th>
                            <th class="text-center">البريد الإلكترونى</th>
                            <th class="text-center">تاريخ التسجيل</th>
                            <th class="text-center">عقاراتى</th>
                            <th class="text-center">نوع العضوية</th>
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
    {{--cd--}}

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable( {
                dom: 'Bfrtip',
                buttons: [  { extend: 'print'}]
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>


@endsection