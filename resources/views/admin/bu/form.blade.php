{{ csrf_field() }}

<div class="form-group{{ $errors->has('bu_name') ? ' has-error' : '' }}">


    <div class="col-md-10">
        <input id="bu_price" type="text" class="form-control" name="bu_name"
               value="{{  isset($bu) ? $bu->bu_name : '' }}"
                autofocus>
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_name') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_price" class="col-md-2 control-label">إسم العقار</label>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">


    <div class="col-md-10">
        @if(isset($bu))
            @if($bu->image != '')
                <img src="{{ Request::root().'/website/buImage/'.$bu->image }}">
            @endif
        @endif
        <br>
        <input id="image" type="file" class="form-control" name="image"
               value="{{  isset($bu) ? $bu->image : '' }}" multiple >
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('image'))
            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
        @endif

    </div>
    <label for="bu_price" class="col-md-2 control-label">صورة</label>
</div>

<div class="form-group{{ $errors->has('bu_price') ? ' has-error' : '' }}">


    <div class="col-md-10">
        <input id="bu_price" type="text" class="form-control" name="bu_price"
               value="{{  isset($bu) ? $bu->bu_price : '' }}"
               required autofocus>
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_price'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_price') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_price" class="col-md-2 control-label">سعر العقار</label>
</div>

<div class="form-group{{ $errors->has('bu_rooms') ? ' has-error' : '' }}">


    <div class="col-md-10">
       {!! Form::select("bu_rooms",roomsnumber(), null, ['class'=> 'form-control']) !!}
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_rooms'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_rooms') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_rooms" class="col-md-2 control-label">عدد الغرف</label>
</div>

<div class="form-group{{ $errors->has('bu_rent') ? ' has-error' : '' }}">


    <div class="col-md-10">
        {!! Form::select("bu_rent", bu_rent(),null , ['class'=>'form-control']) !!}
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_rent'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_rent') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_rent" class="col-md-2 control-label">حالة العقار</label>
</div>

<div class="form-group{{ $errors->has('bu_square') ? ' has-error' : '' }}">


    <div class="col-md-10">
        <input id="bu_square" type="text" class="form-control" name="bu_square"
               value="{{  isset($bu) ? $bu->bu_square : '' }}"
        >
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_square'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_square') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_square" class="col-md-2 control-label">مساحة العقار</label>
</div>

<div class="form-group{{ $errors->has('bu_type') ? ' has-error' : '' }}">


    <div class="col-md-10">
        {!! Form::select("bu_type", bu_type() ,null , ['class'=>'form-control']) !!}
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_type'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_type') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_name" class="col-md-2 control-label">نوع العقار</label>
</div>
@if(!isset($user))
<div class="form-group{{ $errors->has('bu_small_dis') ? ' has-error' : '' }}">


    <div class="col-md-10">
        <textarea id="bu_small_dis" rows="4" class="form-control" name="bu_small_dis" value=""
        >{{  isset($bu) ? $bu->bu_small_dis : '' }}</textarea>
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_small_dis'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_small_dis') }}</strong>
                                    </span>
        @endif
        <div class="alert alert-warning">لا يمكن إدخال أكثر من 160 حرف حسب معايير جوجل</div>
    </div>
    <label for="bu_small_dis" class="col-md-2 control-label">وصف العقار لمحركات البحث</label>
</div>
@endif
<div class="form-group{{ $errors->has('bu_meta') ? ' has-error' : '' }}">


    <div class="col-md-10">
        <input id="bu_meta" type="text" class="form-control" name="bu_meta"
               value="{{  isset($bu) ? $bu->bu_meta : '' }}"
        >
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_meta'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_meta') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_meta" class="col-md-2 control-label"> الكلمات الدليلية</label>
</div>

<div class="form-group{{ $errors->has('bu_langitude') ? ' has-error' : '' }}">


    <div class="col-md-10">
        <input id="bu_langitude" type="text" class="form-control" name="bu_langitude"
               value="{{  isset($bu) ? $bu->bu_langitude : '' }}"
        >
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_langitude'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_langitude') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_langitude" class="col-md-2 control-label">خط الطول</label>
</div>

<div class="form-group{{ $errors->has('bu_latitude') ? ' has-error' : '' }}">


    <div class="col-md-10">
        <input id="bu_latitude" type="text" class="form-control" name="bu_latitude"
               value="{{  isset($bu) ? $bu->bu_latitude : '' }}"
        >
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_latitude'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_latitude') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_latitude" class="col-md-2 control-label">دائرة العرض</label>
</div>

<div class="form-group{{ $errors->has('bu_large_dis') ? ' has-error' : '' }}">


    <div class="col-md-10">
        <textarea id="bu_large_dis" rows="4" class="form-control" name="bu_large_dis" value=""
        >{{  isset($bu) ? $bu->bu_large_dis : '' }}</textarea>
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_large_dis'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_large_dis') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_large_dis" class="col-md-2 control-label">الوصف المطول للعقار</label>
</div>


<div class="form-group{{ $errors->has('bu_place') ? ' has-error' : '' }} clearfix">


    <div class="col-md-10">
        {!! Form::select("bu_place", bu_place(),null , ['class'=>'form-control select2']) !!}
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_place'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_place') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_status" class="col-md-2 control-label">المكان</label>
</div>
@if(!isset($user))

<div class="form-group{{ $errors->has('bu_status') ? ' has-error' : '' }}">


    <div class="col-md-10">
        {!! Form::select("bu_status", status(),null , ['class'=>'form-control']) !!}
        {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
        {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

        @if ($errors->has('bu_status'))
            <span class="help-block">
                                        <strong>{{ $errors->first('bu_status') }}</strong>
                                    </span>
        @endif
    </div>
    <label for="bu_status" class="col-md-2 control-label">حالة العقار</label>
</div>
@endif
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            تنفيذ
        </button>
    </div>
</div>






