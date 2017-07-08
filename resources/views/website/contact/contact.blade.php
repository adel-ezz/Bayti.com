
@extends('layouts.app')
@section('title')
    كل العقارات
@endsection

@section('header')


    <link rel="stylesheet" href="/custmer/buall.css">

@endsection
@section('content')

    <div class="container">
        {!! Form::open(['url' => '/contact/add' , 'method'=>'post']) !!}
            <div class="row">

                <div class="col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>الرسالة</label>
                        <textarea class="col-sm-3 col-md-3 form-control" id="message" placeholder="إكتب الرسالة" name="contact_message" rows="10" required></textarea>
                        <br>
                        <button class="btn btn-primary pull-right sent" type="submit">إرسال</button>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <label class="titl">الإسم</label>
                    <input class="form-control" placeholder="الإسم" type="text" name="contact_name" required>
                    <label class="titl">البريد الإلكترونى </label>
                    <input class="form-control" placeholder="البريد الإلكترونى" name="contact_email" type="email" value="{{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->email : '' }}" required>
                    <label class="titl">عنوان الرسالة</label>
                    <select class="col-sm-3 col-md-3 form-control" id="subject" name="contact_subject">
                        @foreach(contact() as $key=>$value)
                            <option value="{{$key}}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-4 col-md-4">
                    <h1>إتصل بنا</h1>
                    <h4>مكتبنا</h4>
                    <hr>
                   <p>العنوان:: {{ nl2br(getsetting('title')) }}
                    </p>
                    <br>
                    <p>التليفون:: {{ nl2br(getsetting('phone')) }}</p>
                    <br>
                    <p>الإيميل:: {{ nl2br(getsetting('email')) }}</p>
                </div>
            </div>
        {!! Form::close() !!}

        </form>
        <br>
    </div>

</div>
@endsection