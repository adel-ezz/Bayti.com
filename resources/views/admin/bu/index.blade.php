@extends('admin.layouts.layout')
@section('title')
    التحكم فى العقارات
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
            التحكم فى العقارات
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('adminbannel')}}"><i class="fa fa-dashboard"></i> الرئسية </a></li>
            <li class="active"><a href="{{url('/adminbannel/bu')}}">التحكم فى العقارات</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">العقارات</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="pull-right">#</th>
                                <th class="text-center">إسم العقار</th>
                                <th class="text-center">السعر</th>
                                <th class="text-center">النوع</th>
                                <th class="text-center">تاريخ الإضافة</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($bus as $bu)


                                <tr class="text-center">
                                    <td class="text-center">{{ $bu->id }}</td>
                                    <td class="text-center"> {{ $bu->bu_name }}</td>
                                    <td class="text-center">{{ $bu->bu_price }}</td>
                                    <td class="text-center">

                                       {{ bu_type() [ $bu->bu_type ] }}
                                    </td>
                                    <td class="text-center">{{ $bu->created_at }}</td>
                                    <td class="text-center">{{ status()[$bu->bu_status] }}</td>
                                   <td class="text-center">
                                       @if($bu->bu_status ==0 )
                                       <a href="{{ url('/adminbannel/change_status/' . $bu->id . '/1') }}" class="btn btn-primary">تفعيل</a>
                                       @elseif($bu->bu_status ==1)
                                           <a href="{{ url('/adminbannel/change_status/' . $bu->id . '/0') }}" class="btn btn-primary">إلغاء التفعيل</a>
                                       @endif
                                        <a href="{{ url('/adminbannel/bu/' . $bu->id . '/edit') }}" class="btn btn-primary">edite</a>
                                        <a href="{{ url('/adminbannel/bu/' . $bu->id . '/delete' ) }}" class="delete btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <th class="pull-right">#</th>
                            <th class="text-center">إسم العقار</th>
                            <th class="text-center">السعر</th>
                            <th class="text-center">النوع</th>
                            <th class="text-center">تاريخ الإضافة</th>
                            <th class="text-center">الحالة</th>
                            <th class="text-center">التحكم</th>
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