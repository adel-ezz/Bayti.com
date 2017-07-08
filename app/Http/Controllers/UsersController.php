<?php

namespace App\Http\Controllers;

use App\Bu;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use Datatables;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();

        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request )
    {
        
        $user= User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password),
           ]);

       return redirect('/adminbannel/users')->withFlashMessage('تمت إضافة العضو بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);
        $buwaiting=Bu::where('user_id',$id)->where('bu_status',0)->paginate(6);
        $buenable=Bu::where('user_id',$id)->where('bu_status',1)->paginate(6);
        return view('/admin/user/edite',compact('user','buwaiting','buenable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $useruptated= User::find($id);
        $useruptated->fill($request->all())->save();
        return redirect('/adminbannel/users')->withFlashMessage('تمت تعديل العضو بنجاح');
//        return redirect('/adminbannel/users')->withFlashMessage('تمت إضافة العضو بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updatePassword(Request $request )
    {
        $userupdate=User::find($request->user_id);
        $password=bcrypt($request->password);
        $userupdate->fill(['password'=>$password])->save();
        return redirect('/adminbannel/users')->with('status', 'Profile updated!');


    }

    public function destroy($id, User $user  )
    {
        //
        if($id !=1) {
            $user->find($id)->delete();
        }
        return redirect('/adminbannel/users')->withFlashMessage('تمت حذف العضو بنجاح');
    }


    public function userinfo()
    {
        $user=Auth::user();
        return view('website.profile.edite',compact('user'));
    }
    public function userupdateprofile(UserUpdateRequest $request, User $user)
    {
        $user=Auth::user();

        if($request->email != $user->email)
        {
            $checkmail=$user->where('email' , $request->email)->count();
            if ($checkmail == 0)
            {
                $user->fill($request->all())->save();
            }
            else
            {
                return Redirect::back()->withFlashMessage('هذا الإميل موجود مسبقا');
            }


        }
        else
        {
            $user->fill(['name'=> $request->name])->save();
        }


        return Redirect::back()->withFlashMessage('تم التعديل على المعلومات بنجاح');
    }

    public function changepass(Request $request, User $users, $id)

    {
        $user=$users->findOrfail($id);

        $this->validate($request, [
            'password' => 'required|min:6',
            'newpassword' => 'required|min:6'
        ]);

//        $pass=$request->password;
//        dd(bcrypt($pass) , $user->password);

        if(Hash::check($request->password , $user->password))
        {
            if(!empty($request->newpassword)) {
                $hash = Hash::make($request->newpassword);
                $user->fill(['password' => $hash])->save();
                return Redirect::back()->withFlashMessage('تم تغيير الباسورد بنجاح');
            }
        }
        else
        {
            return Redirect::back()->withFlashMessage('الرمز السرى الذى ادخلته غير صحيح اعد المحاولة');
        }
    }
//    public function anyData(User $user)
//    {
//
//
//        $users = $user->all();
//
//        return Datatables::of($users)
//
//            ->editColumn('name', function ($model) {
//                return '<a href="'.url('/adminbannel/users/' . $model->id . '/edit').'">'.$model->name.'</a>';
//            })
//            ->editColumn('admin', function ($model) {
//                return $model->admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span>' : '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
//            })
//
//
//            ->editColumn('mybu', function ($model) {
//                return '<a href="'.url('/adminbannel/bu/' . $model->id).'"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>';
//            })
//
//            ->editColumn('control', function ($model) {
//                $all = '<a href="' . url('/adminbannel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
//                if($model->id != 1){
//                    $all .= '<a href="' . url('/adminbannel/users/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
//                }
//                return $all;
//            })
//            ->make(true);
//
//    }


}
