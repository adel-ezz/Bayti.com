<div class="col-lg-3">
@if(Auth::user())
    <div class="profile-sidebar">
        <h2>خيارات العضو</h2>
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="{{ Request::is('user/usereditsitting') ?'active':'' }}">
                    <a href="{{ url('/user/usereditsitting') }}">
                        <i class="fa fa-edit"></i>
  تعديل المعلومات الشخصية </a>
                </li>
                <li class="{{ Request::is('user/bulandshow') ?'active':'' }}">
                    <a href="/user/bulandshow">
                        <i class="fa fa-check"></i>
                        عقاراتى المفعلة

                   <label class="label label-danger pull-left">{{ countforuser(Auth::user()->id,1) }}</label>
                    </a>

                </li>
                <li class="{{ Request::is('user/bulandshowWaiting') ?'active':'' }}">
                    <a href="/user/bulandshowWaiting">
                        <i class="fa fa-clock-o"></i>
                                                عقاراتى فى إنتظار التغعيل
                        <label class="label label-danger pull-left">{{ countforuser(Auth::user()->id,0) }}</label>
                    </a>
                </li>
                <li class="{{ Request::is('user/create/bubuild') ?'active':'' }}">
                    <a href="/user/create/bubuild">
                        <i class="fa fa-plus"></i>
                        أضف عقار </a>
                </li>

            </ul>
        </div>
        <!-- END MENU -->
    </div>
@endif
    <div class="profile-sidebar">
        <h2>خيارات العقارات</h2>
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                {{--{{ setActive(['/showAllbu']) }}--}}

                <li class="{{ Request::is('showAllbu') ? 'active' : 'sss' }}">
                    <a href="{{ url('/showAllbu') }}">
                        <i class="fa fa-building"></i>
                        كل العقارات </a>
                </li>
                <li class="{{ Request::is('forrent') ? 'active' : 'sss' }}">
                    <a href="/forrent">
                        <i class="fa fa-calendar-o"></i>
                        إيجار </a>
                </li>
                <li class="{{ Request::is('forbuy') ? 'active' : 'sss' }}">
                    <a href="forbuy">
                        <i class="fa fa-building-o"></i>
                        تمليك </a>
                </li>
                <li class="{{ Request::is('type/0') ? 'active' : 'sss' }}" >
                    <a href="{{ url('/type/0') }}">
                        <i class="fa fa-university"></i>
                        الشقق </a>
                </li>
                <li class="{{ Request::is('type/1') ? 'active' : 'sss' }}">
                    <a href="{{ url('/type/1') }}">
                        <i class="fa fa-home"></i>
                        الفيلل </a>
                </li>
                <li class="{{ Request::is('type/2') ? 'active' : 'sss' }}">
                    <a href="{{ url('/type/2') }}">
                        <i class="fa fa-location-arrow"></i>
                        شاليهات </a>
                </li>
            </ul>

        </div>
        <!-- END MENU -->
    </div>
    <br>
    <div class="profile-sidebar">
        <h2>البحث المتقدم</h2>
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            {!! Form::open(['url'=> 'search', 'method'=> 'get']) !!}
            <ul class="nav nave">
                <li>
                    {!! Form::text("bu_price_from",null,['class'=>'form-control','placeholder'=>'سعر العقار من..... ']) !!}
                </li>
                <li>
                    {!! Form::text("bu_price_to",null,['class'=>'form-control','placeholder'=>'سعر العقار إلى.....']) !!}
                </li>
                <li>
                    {!! Form::select("bu_rooms",roomsnumber(),null,['class'=>'form-control','placeholder'=>'عدد الغرف']) !!}
                </li>
                <li>
                    {!! Form::select("bu_place",bu_place(),null,['class'=>'form-control select2','placeholder'=>'المكان']) !!}
                </li>
                <li>
                    {!! Form::select("bu_type",bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
                </li>
                <li>
                    {!! Form::select("bu_rent",bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع العملية']) !!}
                </li>
                <li>
                    {!! Form::text("bu_square",null,['class'=>'form-control','placeholder'=>'المساحة']) !!}
                </li>
                <li>
                    {!! Form::submit("ابحث",['class'=>'btn btn-success']) !!}
                </li>

            </ul>
            {!! Form::close() !!}
        </div>
        <!-- END MENU -->
    </div>
</div>