@if(count($bu) > 0)

    @foreach($bu as $key=>$b)
        @if($key % 3 ==0 && $key !=0 )
            <div class="clearfix"></div>
        @endif

        <div class="col-md-4 col-sm-6 pull-right">
    		<span class="thumbnail">
                 {{--<img src="{{ Request::root().'/website/buImage/'.$b->image }}">--}}
      			<img class="acarimage" src="{{ checkifinageisexist($b->image) }}" alt="...">
      			<h4>{{ $b->bu_name }}</h4>
      			<div class="ratings">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>
      			<p>{{ str_limit($b->bu_small_dis ,30) }}</p>
                <hr>
              مساحة العقار:  {{ $b->bu_square }} /
نوع العملية :
           {{ bu_rent()[$b->bu_rent]  }}
      			<hr class="line">
      			<div class="row">

      				<div class="col-md-12 col-sm-12">
                        @if( $b->bu_status ==0 )
                            <span class="btn btn-danger pull-left"> فى إنتظار التفعيل</span>

                            <a href="{{ url('user/editBu/'.$b->id) }}" class="btn btn-success clearfix right" >تعديل العقار</a>
                            @else
                            <a href="{{ url('singleBu/'.$b->id ) }}" class="btn btn-success right"> أظهر التفاصيل</a>
                            @endif

      				</div>
                     <div class="col-md-12 col-sm-12">
      					<p class="price">{{ $b->bu_price }}</p>
      				</div>
      			</div>
    		</span>
        </div>

    @endforeach
    <div class="clearfix"></div>
@else
    <div class="alert alert-danger">لا يوجد اى عقارات حالية</div>
@endif