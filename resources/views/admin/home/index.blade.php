@extends('admin.layouts.layout')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpannel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        </ol>
    </section>
    <hr>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">الرسائل</span>
                        <span class="info-box-number">{{ $contactUs }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-building-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">عدد العقارات المفعلة</span>
                        <span class="info-box-number">{{ $buCountActive }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">العقارات الغير مفعلة</span>
                        <span class="info-box-number">{{ $buCountnotActiv }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">الأعضاء</span>
                        <span class="info-box-number">{{ $userCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">التقييم السنوى للسنة الحالية</h3>
                        {{--{{ $code }}--}}

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">
                                    <strong>العقارات المضافة حسب الشهور</strong>
                                </p>

                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- MAP & BOX PANE -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">أماكن العقارات</h3>

                        <div class="box-tools pull-left">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-md-9 col-sm-8">
                                <div class="pad">
                                    <!-- Map will be created here -->
                                    <div id="world-map-markers" style="height: 325px;"></div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-4">
                                <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                    <div class="description-block margin-bottom">

                                        <h5 class="description-header">{{ $buCountActive }}</h5>
                                        <span class="description-text"><br>العقارات المفعلة</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block margin-bottom">

                                        <h5 class="description-header">{{  $buCountnotActiv }}</h5>
                                        <span class="description-text"><br>عقارات فى إنتظار التغعيل</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block">

                                        <h5 class="description-header">{{ $buCountnotActiv + $buCountActive}}</h5>
                                        <span class="description-text"><br>كل العقارات</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->

            <div class="col-md-4">


                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">أخرالعقارات المضافة</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                        @foreach($lastbu as $bu)
                            <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{ checkifinageisexist($bu->image) }}" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <span class="label label-info pull-left">{{ $bu->bu_price }}</span>
                                        <a href="/adminbannel/bu/" .{{ $bu->id }}."/edit"
                                        class="product-title">{{ $bu->bu_name }}
                                        </a>

                                        <span class="product-description">
                          {{ $bu->bu_small_dis }}
                        </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ url('/adminbannel/bu/') }}" class="uppercase">كل العقارات</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <!-- /.col -->
            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">أخر الأعضاء المسجلين</h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger">8 أعضاء</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach($lastsuser as $lastsuserc)
                                <li>
                                    <img src="/admin/dist/img/user1-128x128.jpg" alt="{{ $lastsuserc->name }}">
                                    <a class="users-list-name"
                                       href="{{ url('/adminbannel/users/'.$lastsuserc->id .'/edit') }}">{{ $lastsuserc->name }}</a>
                                    <span class="users-list-date">{{ $lastsuserc->created_at }}</span>
                                </li>
                            @endforeach

                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ url('/adminbannel/users') }}" class="uppercase">إظهار كل الأعضاء</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
            <!-- /.col -->
            <!-- TABLE: LATEST ORDERS -->
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">أخر الرسائل</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th class="text-right"> ID</th>
                                    <th class="text-right">إسم المرسل</th>
                                    <th class="text-right">إيميل المرسل</th>
                                    <th class="text-right"> هدف الرسالة</th>
                                    <th class="text-right">نوع الرسالة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latestcontact as $message)
                                    <tr>
                                        <td>
                                            <a href="{{ url('adminbannel/contact/'. $message->id .'/edit') }}">{{ $message->id }}</a>
                                        <td>
                                            <a href="{{ url('adminbannel/contact/'. $message->id .'/edit') }}">{{ $message->contact_name }}</a>
                                        </td>
                                        <td><span class="label label-success">{{ $message->contact_email}}</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                {{ contact()[$message->contact_type] }}
                                            </div>
                                        </td>
                                        <td>
                                            @if($message->view ==1)
                                                <span>مقروئة</span>
                                            @else
                                                <span>غير مقروءة</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{ url('/adminbannel/contact') }}" class="btn btn-sm btn-info btn-flat pull-left">كل
                            الرسائل</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
@section('footer')
    <script>
        //-----------------------
        //- MONTHLY SALES CHART -
        //-----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونية", "يولية", "أعسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
            datasets: [

                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [
                        @foreach($new as $c)
                                @if(!is_array($c))
                            0,
                        @else
                        {{ $c['counting'] }},
                        @endif
                        @endforeach
                    ]
                }
            ]
        };

        /* jVector Maps
         * ------------
         * Create a world map with markers
         */
        $('#world-map-markers').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: 'rgba(210, 214, 222, 1)',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    "fill-opacity": 0.7,
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {}
            },
            markerStyle: {
                initial: {
                    fill: '#00a65a',
                    stroke: '#111'
                }
            },
            markers: [
                    @foreach($mapping as $map)
                {
                    latLng: [ {{$map->bu_langitude}} , {{$map->bu_latitude}} ], name: '{{ $map->bu_name }}'
                },
                @endforeach


            ]
        });

    </script>
@endsection