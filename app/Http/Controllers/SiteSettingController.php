<?php

namespace App\Http\Controllers;
use App\SiteSetting;
use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings=SiteSetting::all();
        return view('admin.sitesettings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        foreach ($request->settings as $key => $setting) {
//            dd($setting);
//            dump($key);


            $settings = SiteSetting::find($key);
            if($settings->type == 3)
            {
                $imageName = time() . '.' . $request->settings[14]->getClientOriginalName();
                $oldImage=$settings->value;
                $url=base_path() . '/public/website/buImage';
                if (file_exists($url.'/'.$oldImage))//to Delete past image
                {
                      unlink($url.'/'.$oldImage);
//                    dd('done');
                }


                $request->settings[14]->move(base_path() . '/public/website/buImage', $imageName);
                $settings->value=$imageName;
                $settings->save();

            }
            else
            {
                $settings->value = $setting;
                $settings->save();
            }
        }

        return back()->withFlashMessage( 'تم تعديل الاعدادات بنجاح');


        //
//        foreach ( $request->except(['_token','submit']) as $key=>$req)
//        {
////            $blog= Blog::findOrFail($id);
////            $blog->title=$request->title;
////            $blog->description=$request->description;
////            $blog->save();
//            dump($key);
//            dump($req);
////           $doe=$siteSeting->value;
////            dump($doe);
////            $siteSeting = SiteSetting::find($key);
//////            dump($settings);
////            $siteSeting->value = $req;
//////            dump($siteSeting);
////            $siteSeting->save();
///
//            foreach ($request->except(['_token','submit']) as $key => $setting) {
////                dump($key);
////                $settings = SiteSetting::find($key);
////                dump($settings);
//                $settings->value = $setting;
//                $settings->save();
//            }

//            return back()->with('success', 'تم تعديل الاعدادات بنجاح');
//        }
//        return back();
//        $request->except(['_token','submit'])->toArray();







//        foreach ($request->settings as $key=>$req)
//        {
//            $sitesettings=settings->whare('namesetting',key)->get()[0];
//            $sitesettings->fill(['value'=> $req ])->save();
//        }

//        $inputs = $request->except('_token');
//        foreach ($inputs as $key=>$setting)
//        {
//
//            $settings = SiteSetting::find($setting);
//            $settings->value = $setting;
//            $settings->save();
//
//        }
//        foreach ($request->except(['_token','submit']) as $key=>$data)
//        {
////            echo $data .'<br>';
////            dump($data);

//            $settings = SiteSetting::find($key);
//            dump($settings);
//            $sitesetting=SiteSetting::all();
//            //////////////////////////////////////
//            $siteUpdate=SiteSetting::where('namesetting' ,'=', $key );
//            $settings = find($key);
//            $settings->value = $setting;
//            $settings->save();
//
//            dump($siteUpdate);
//            /////////////////////////////////
//            $siteUpdate->fill(['value'=>$data ])->save();
        }
//        return back();
//        return back()->with('success', 'تم تعديل الاعدادات بنجاح');
//        foreach ($request->settings as $key => $setting) {
//            $settings = SiteSetting::find($key);
//            $settings->value = $setting;
//            $settings->save();
//        }
//
//        return back()->with('success', 'تم تعديل الاعدادات بنجاح');






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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
