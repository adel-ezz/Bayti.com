@extends('layouts.app')
@section('title')
| خيارات العقارات
@endsection

@section('header')
    

    <link rel="stylesheet" href="/custmer/buall.css">

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <ol class="breadcrumb">

                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key=>$value)
                                <li><a href="{{ url('/search?'.$key.'='.$value) }}">{{ search()[$key] }} ->
                                        @if($key == 'bu_type')
                                        {{ bu_type()[$value] }}
                                        @elseif($key=='bu_rent')
                                            {{ bu_rent()[$value] }}
                                         @elseif($key== 'bu_place')
                                            {{ bu_place()[$value] }}
                                        @else
                                            {{ $value   }}
                                        @endif
                                    </a></li>
                            @endforeach
                        @endif
                    @endif
                </ol>
                @include('website.bu.sharefile',['bu' => $buAll ])
                <div class="text-center">
                    {{ $buAll->appends(Request::except('page'))->render() }}
                </div>
            </div>
            @include('website.bu.bage');
        </div>
    </div>
@endsection
