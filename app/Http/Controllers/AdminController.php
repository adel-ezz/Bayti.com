<?php

namespace App\Http\Controllers;

use App\Bu;
use App\ContactUs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Bu $bu, ContactUs $contactUs)
    {
        //

        $buCountActive = countallbuappendtostatus(1);
        //////////////////////////
        $buCountnotActiv = countallbuappendtostatus(0);
        /////////////////
        $userCount = $user->count();
        ////////////////////
        $contactUs = $contactUs->count();
        ////////////////////
        $mapping = $bu->select('bu_langitude', 'bu_latitude', 'bu_name')->get();
///////////////////chart-Start/////////////////////
        $chart = $bu->select(DB::raw('COUNT(*) as counting ,month'))
            ->where('year', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()->toArray();
        $array = [];
        for ($i = 1; $i < $chart[0]['month']; $i++) {
//            dd($chart[0]['month']);
            $array [] = 0;
        }
        $new = array_merge($array, $chart);
/////////////////chart-End//////////////////////////
        $lastsuser = $user->take('8')->orderBy('id', 'desc')->get();
        $lastbu = $bu->take('4')->orderBy('id', 'desc')->get();
        $latestcontact = ContactUs::take('7')->orderBy('id', 'desc')->get();

        return view('admin.home.index', compact(
            'buCountActive',
            'buCountnotActiv',
            'userCount',
            'contactUs',
            'mapping',
            'new',
            'lastsuser',
            'lastbu',
            'latestcontact',
            'code'

        ));

    }

    public function showyearsstatics(Bu $bu, Request $request)
    {
        $year = $request->year;

        $chart = $bu->select(DB::raw('COUNT(*) as counting ,month'))
            ->where('year', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()->toArray();
//        dd($chart[0]);
        //dd($chart);
        $array = [];
//        dd($chart[0]['month']);
        if (isset($chart[0]['month'])) {
            for ($i = 1; $i < $chart[0]['month']; $i++) {
//            dd($chart[0]['month']);
                $array [] = 0;
            }
        }
        $new = array_merge($array, $chart);
//        dd($array,$new);

        return view('admin.home.statics', compact('year', 'chart', 'new'));
    }

    public function showYearThis(Request $request, Bu $bu)
    {
        $year = $request->year;
        $chart = $bu->select(DB::raw('COUNT(*) as counting ,month'))
            ->where('year', $year)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->toArray();
//        dd($chart[0]);

        //dd($chart);
        $array = [];
        if (isset($chart[0]['month'])) {
            for ($i = 1; $i < $chart[0]['month']; $i++) {
                //            dd($chart[0]['month']);
                $array [] = 0;
            }
        }
        $new = array_merge($array, $chart);
        return view('admin.home.statics', compact('year', 'chart', 'new'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
