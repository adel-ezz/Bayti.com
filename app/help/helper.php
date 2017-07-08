<?php

function getsetting($sitname = "sitename")
{
    return \App\SiteSetting::where('namesetting', $sitname)->get()[0]->value;
}

function checkifinageisexist($imagename = '')
{

//    $path = base_path() . '/public/website/buImage/' . $imagename;

    if ($imagename != '')
    {
        return Request::root() . '/website/buImage/' . $imagename;
    }
    else
    {
        return getsetting('noimage');
    }
}

function bu_type()
{
    $array = [
        ' شقة',
        ' فيلا',
        ' شالية',
    ];
    return $array;
}

function bu_rent()
{
    $array = [
        ' إيجار ',
        ' تمليك',
        ' أيجار / تمليك ',
    ];
    return $array;
}

function status()
{
    $array = [
        ' غير مفعل',
        ' مفعل '
    ];
    return $array;
}
function contact()
{
     $array=[
         '0'=>'بلا عنوان',
         '1'=>'اعجاب',
         '2'=>'إقتراح',
         '3'=>'إستفسار',
    ];
    return $array;
}
function roomsnumber()
{
    $array = [];
    for ($i = 2; $i <= 40; $i++) {
        $array[$i] = $i;
    }
    return $array;
}

function bu_place()
{
    $places = [
        'da' => 'دمياط',
        'mans' => 'المنصوره',
        'asw' => 'أسوان',
    ];
    return $places;
}

function search()
{
    return [
        'bu_price' => ' سعر العقار ',
        'bu_rooms' => ' عدد الغرف',
        'bu_place' => ' موقع العقار',
        'bu_type' => ' النوع',
        'bu_rent' => 'إيجار أو تمليك',
        'bu_square' => ' مساحة العقار',
        'bu_price_to' => ' إلى ',
        'bu_price_from' => ' من',
    ];
}

function uploadImage($request,$path='/public/website/buImage',$width='500',$height='362',$deleteFileName='')
{
    $dim=getimagesize($request);
    $fileName=$request->getClientOriginalName();
    $request->move(base_path().$path,$fileName);
    if($deleteFileName !='')
    {
        if(file_exists($deleteFileName))
        {
            \Illuminate\Support\Facades\File::delete($deleteFileName);
        }
    }
}

function unreadeMessage(){
    return \App\ContactUs::where('view',0)->get();
}
function countunreadMessage()
{
    return \App\ContactUs::where('view',0)->count();
}
//function setActive($array)
//{
//    if(!empty($array))
//    {
//        $seg_array=[];
//        foreach($array as $key=>$url)
//        {
//            if(Request::segment($key++) == $url)
//            {
//                $seg_array=[] = $key;
//            }
//        }
//        if (count($seg_array)==count(Request::segments()))
//        {
//            return 'active';
//        }
//    }
//
//    dd(Request::segment(1));
//    dd(Request::segments());
//}
function countforuser($user_id,$status)
{
  return \App\Bu::where('bu_status',$status)->where('user_id',$user_id)->count();
}
function countallbuappendtostatus($status)
{
    return \App\Bu::where('bu_status',$status)->count();
}