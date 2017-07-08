@extends('admin.layouts.layout')
@section('title')
إضافة عقار
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
        <li ><a href="{{url('/user')}}">التحكم فى العقارات</a></li>
         <li ><a href="{{url('/adminbannel/bu/create')}}">إضافة عقار جديد</a></li>
      </ol>
    </section>




       <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">إضافة عقار جديد</h3>
            </div>
            <!-- /.box-header -->

             <form class="form-horizontal"  method="POST" action="{{url('adminbannel/bu')}}" accept-charset="UTF-8" enctype="multipart/form-data">
            	   @include('admin.bu.form')

              </form>
            </div>
          </div>
        </div>
      </div>
     </section>
@endsection
















@section('footer')
 <!-- DataTables -->
	
@endsection