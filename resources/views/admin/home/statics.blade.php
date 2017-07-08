@extends('admin.layouts.layout')
@section('title')
    إحصائيات إضافة العقارات من السنه
    {{ $year }}
@endsection

@section('header')

@endsection





@section('content')






    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            أضف عضو
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminbannel')}}"><i class="fa fa-dashboard"></i> الرئسية </a></li>
            <li class="active"><a href="{{ url('/adminbannel/buyear/status') }}">إحصائيات</a></li>
        </ol>
    </section>




    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url'=>'/adminbannel/buyear/status','method'=>'post']) !!}
                <select class="select2" name="year" style="width: 100px">
                    @for($i=2015 ; $i<=2100 ; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <input name="submit" type="submit" value="إظهارالإحصائيات" class="btn btn-warning">
                {!! Form::close() !!}
                <p class="text-center">
                    <strong> إحصائيات إضافة العقارات السنه
                        {{ $year }}
                    </strong>
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
    </section>
@endsection
















@section('footer')
    <!-- DataTables -->
    <script>  //-----------------------
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
    </script>

@endsection