@extends('admin.layouts.layout')
@section('title')
إضافة عضو
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
        <li ><a href="{{url('/user')}}">التحكم فى الأعضاء</a></li>
         <li ><a href="{{url('/adminbannel/users/create')}}">إضافة عضو جديد</a></li>
      </ol>
    </section>




       <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">إضافة عضو جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

             <form class="form-horizontal" role="form" method="POST" action="{{url('/adminbannel/users')}}">

            	   @include('admin.user.form') 
                  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل عضوية جديدة
                                </button>
                            </div>
                        </div>
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