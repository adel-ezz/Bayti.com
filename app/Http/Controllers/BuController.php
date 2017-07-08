<?php

namespace App\Http\Controllers;

use App\Bu;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Http\Requests\BuRequest;
use Illuminate\Support\Facades\Redirect;

class BuController extends Controller
{


    //
    public function index(Bu $bu , Request $request)
    {
        $id= $request->id;
        if ($request->id != null)
        {
            $bus= $bu->where('user_id','=', $id)->OrderBy('id', 'desc')->paginate(6);

            return view('admin.bu.index', compact('bus'));
        }
        else {
            $bus = Bu::all();

            return view('admin.bu.index', compact('bus'));
        }
//        $lessons=Bu::find($id);
////        $lessons=Bu::all();
//        if(! $lessons)
//        {
//            return \response()->json([
//               'error'=>[
//                   'message'=>'This Wrong'
//               ]
//            ],404);
//        }
//        return \response()->json([
//            'data'=>$lessons->toArray()
//        ],200);


    }

    public function create()
    {
        return view('admin.bu.add');
    }

    public function store(BuRequest $request, Bu $bu)
    {
//        dd('store');

        if ($request->image) {
            $imageName = date('YmdHis', time()).mt_rand() . '.' . $request->image->getClientOriginalName();
            $request->image->move(base_path() . '/public/website/buImage', $imageName);
            $imge=$imageName;
        }
        else
        {
            $imge='';
        }


        $user = Auth::user();
        $data = [
            'bu_name' => $request->bu_name,
            'bu_price' => $request->bu_price,
            'bu_rooms' => $request->bu_rooms,
            'bu_rent' => $request->bu_rent,
            'bu_square' => $request->bu_square,
            'bu_type' => $request->bu_type,
            'bu_small_dis' => $request->bu_small_dis,
            'bu_meta' => $request->bu_meta,
            'bu_langitude' => $request->bu_langitude,
            'bu_latitude' => $request->bu_latitude,
            'bu_large_dis' => $request->bu_large_dis,
            'bu_status' => $request->bu_status,
            'user_id' => $user->id,
            'bu_place' => $request->bu_place,
            'image' => $imge,
            'month' => data('m'),
            'year'  =>date('Y'),
        ];
        $bu->create($data);
        return redirect('adminbannel/bu')->withFlashMessage('تم إضافة العقار بنحاح');
    }

    public function edit($id,User $user)
    {
        $bu = Bu::find($id);
        if($bu->user_id ==0)
        {
            $user=0;
        }
        else
        {
            $user=$user->where('id' , $bu->user_id)->get()[0];
        }
        return view('/admin/bu/edite', compact('bu','user'));

    }

    public function update(Request $request, $id)
    {
        //
        $buupdate = Bu::find($id);
        $buupdate->fill($request->except('image'))->save();
//        return redirect('/adminbannel/bu')->with('status', 'Profile updated!');
        if ($request->image) {
            $imageName = time() . '.' . $request->image->getClientOriginalName();
            $request->image->move(base_path() . '/public/website/buImage', $imageName);
            $buupdate->fill(['image' => $imageName])->save();
        }
        return redirect('/adminbannel/bu')->withFlashMessage('تم التعديل');
    }

    public function destroy($id, Bu $bu)
    {

        $bu->find($id)->delete();
        return redirect('/adminbannel/bu')->with('status', 'delete');
    }

//    public function showuserbuildforAdmin($id)
//    {
//
//        $bus = Bu::find();
//        dd($bus);
//        return view('admin.bu.index', compact('bus'));
//    }
    ///for frontEnd
    public function showAllEnable(Bu $bu)
    {
        $buAll = $bu->where('bu_status', 1)->OrderBy('id', 'desc')->paginate(6);
        return view('/website/bu.all', compact('buAll'));
    }



    ///for forrent
    public function forrent(Bu $bu)
    {
        $buAll = $bu->where('bu_status', 1)->where('bu_rent', 1)->OrderBy('id', 'desc')->paginate(6);
        return view('/website/bu.all', compact('buAll'));
    }

    public function forbuy(Bu $bu)
    {
        $buAll = $bu->where('bu_status', 1)->where('bu_rent', 0)->OrderBy('id', 'desc')->paginate(6);
        return view('/website/bu.all', compact('buAll'));
    }

    public function showbytype($type, Bu $bu)
    {
        if (in_array($type, ['0', '1', '2'])) {
            $buAll = $bu->where('bu_status', 1)->where('bu_type', $type)->OrderBy('id', 'desc')->paginate(6);
            return view('/website/bu.all', compact('buAll'));
        } else
            return Redirect::back();
    }

    public function search(Request $request, Bu $bu)
    {
//        $max= $request->bu_price_to == '' ? '10000000' : $request->bu_price_to ;
//        $min=$request->bu_price_from== '' ? '1000' : $request->bu_price_from;
//        dd($request->bu_price_from);
//        dd($max,$min);


        $requestAll = array_except($request->toArray(), ['submit', '_token', 'page']);
        $query = DB::table('bu')->select('*');
        $array = [];
        $i = 0;
        $count = count($requestAll);
        foreach ($requestAll as $key => $req) {
            $i++;
            if ($req != '') {
//               echo $key;
//               dump($key);
                if ($key == 'bu_price_from' && $request->bu_price_tp == '') {
//                   $query->whereBetween('bu_price', [$min, $max]);
                    $query->where('bu_price', '>=', $req);
                } elseif ($key == 'bu_price_to' && $request->bu_price_from == '') {
                    $query->where('bu_price', '<=', $req);
                } else {
                    if ($key != 'bu_price_to' && $key != 'bu_price_from') {
                        $query->where($key, $req);
                    }
                }
                $array[$key] = $req;
            } elseif ($count == $i && $request->bu_price_to != '' && $request->bu_price_from) {
                $query->whereBetween('bu_price', [$request->bu_price_from, $request->bu_price_to]);
                $array[$key] = $req;
            }
        }
        $buAll = $query->paginate(6);
        return view('/website/bu.all', compact('buAll', 'array'));
    }

    public function showSingle($id, Bu $bu)
    {
        $buInfo = $bu->findOrfail($id);

        if($buInfo->bu_status == 0 )
        {
            return view('website.bu.noper',compact('buInfo'));

        }
        else
        {
            $same_rent = $bu->where('bu_rent', $buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
            $same_type = $bu->where('bu_type', $buInfo->bu_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
            return view('website.bu.single', compact('buInfo', 'same_rent', 'same_type'));
        }
    }

    public function getAjaxInfo(Request $request,Bu $bu)
    {
        return $bu->find($request->id)->tojson();
    }


    public  function userAddtoview()
    {
        return view('website.userbu.useradd');
    }
    public function userstore(BuRequest $burequest,Bu $bu)
    {

        if ($burequest->image) {
            $imageName = time() . '.' . $burequest->image->getClientOriginalName();
            $burequest->image->move(base_path() . '/public/website/buImage', $imageName);
            $imge=$imageName;
        }
        else
        {
            $imge='';
        }


        $user = Auth::user() ? Auth::user()->id : 0;
        $data = [
            'bu_name' => $burequest->bu_name,
            'bu_price' => $burequest->bu_price,
            'bu_rooms' => $burequest->bu_rooms,
            'bu_rent' => $burequest->bu_rent,
            'bu_square' => $burequest->bu_square,
            'bu_type' => $burequest->bu_type,
            'bu_small_dis' => strip_tags(str_limit($burequest->bu_large_dis,160)),
            'bu_meta' => $burequest->bu_meta,
            'bu_langitude' => $burequest->bu_langitude,
            'bu_latitude' => $burequest->bu_latitude,
            'bu_large_dis' => $burequest->bu_large_dis,
            'user_id' => $user,
            'bu_place' => $burequest->bu_place,
            'image' => $imge,
            'month' =>date('m'),
            'year'  =>date('Y'),
        ];
        $bu->create($data);
        return view('website.userbu.done');
    }

    public function showUserbuild(Bu $bu)
    {
        $user=Auth::user();
        $bu=$bu->where('user_id',$user->id)->where('bu_status',1)->paginate(10);
        return view('website.userbu.showuserbu',compact('bu','user'));
    }
    public function showUserbuildWaiting(Bu $bu)
    {
        $user=Auth::user();
        $bu=$bu->where('user_id',$user->id)->where('bu_status',0)->paginate(10);
        return view('website.userbu.showuserbu',compact('bu','user'));
    }

    public function userEditeBuild($id,Bu $bu)
    {

        $user=Auth::user();
        $buinfo=$bu->find($id);
        if($user->id != $buinfo->user_id)
        {
            return Redirect::back()->withFlashMessage('يبدوا أن هناك خطأ ماإما ان العفار تم تفعيلة أو أنه ليس لديك الحق فى تعديلة لإرسال مشكله ما اتصل بنا');
        }
        else {
            return view('website.userbu.edit', compact('buinfo', 'user'));
        }
    }
    public function userupdateBuild(BuRequest $request,Bu $bu)
    {
        $buupdate=$bu->find($request->id);
        $buupdate->fill($request->except('image'))->save();
//        return redirect('/adminbannel/bu')->with('status', 'Profile updated!');
        if ($request->image) {
            $imageName = time() . '.' . $request->image->getClientOriginalName();
            $request->image->move(base_path() . '/public/website/buImage', $imageName);
            $buupdate->fill(['image' => $imageName])->save();
        }
        return Redirect::back()->withFlashMessage('تم التعديل');

    }
    public function changestatus($id,$status)
    {
        $buUpdate=Bu::find($id);
        $buUpdate->fill([ 'bu_status'=>$status ])->save();
        return Redirect::back()->withFlashMessage('تم التعديل بنجاح');
    }

}
