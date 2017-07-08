@extends('admin.layouts.layout')
@section('title')
    إعداد بياتات الموقع
@endsection

@section('header')

@endsection





@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            تعديل إعدادات الموقع
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminbannel')}}"><i class="fa fa-dashboard"></i> الرئسية </a></li>
            <li class="active"><a href="{{url('adminbannel/sitesettings')}}">تعديل إعدادات الموقع</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> تعديل إعدادات الموقع</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('/adminbannel/sitesettings') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @foreach($settings as $setting)
                                <div class="form-group clearfix">
                                    <div class="col-md-10">

                                        @if( $setting->type  == 0)
                                            <input type="text" class="form-control" name="settings[{{ $setting->id }}]"
                                                   value="{{ $setting->value }}" required>
                                            @elseif($setting->type  == 3)
                                            <img src="{{ checkifinageisexist(getsetting('main_slider')) }}">
                                            <input type="file" class="form-control" name="settings[{{ $setting->id }}]"
                                                   value="{{ $setting->value }}">
                                        @else
                                            <textarea class="form-control" name="settings[{{ $setting->id }}]"
                                                      value="{{ $setting->value }}"
                                                      required>{{ $setting->value }}</textarea>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <label for="password-confirm" class=" control-label">
                                            {{ $setting->slug }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                            <button type="submit" name="submit" class="btn btn-success">save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
