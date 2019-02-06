<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Generallead;
use App\User;
use Libraries\LogData;

class DashboardTopUserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('dashboard.topsellers');
    }

    public function refresh(Request $request) {


        $leads = array();
        $users = User::where('branch_id', '<>', '')
                ->where('role_id', '=', 5)
                ->get();

        $datesArr = array('', '');

        foreach ($users as $user) {

            $leaddata = array(
                'name' => $user->name,
                'empid' => $user->empid,
                'branch' => $user->branch->name,
            );

          //  $leaddata['totalleads'] = LogData::numberShorten(count(Generallead::where('marketer_id', $user->id)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->get()));
            $leaddata['positiveleads'] = LogData::numberShorten(count(Generallead::where('marketer_id', $user->id)->where('conversionstatus_id', 6)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->get()),0);
          //  $leaddata['inprogressleads'] = LogData::numberShorten(count(Generallead::where('marketer_id', $user->id)->where('conversionstatus_id', 3)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->get()));
           // $leaddata['negativeleads'] = LogData::numberShorten(count(Generallead::where('marketer_id', $user->id)->where('conversionstatus_id', 2)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->get()));
            $leaddata['converted'] = LogData::numberShorten(count(Generallead::where('marketer_id', $user->id)->where('conversionstatus_id', 1)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->get()),0);
            $leaddata['revenue'] = LogData::numberShorten(Generallead::where('marketer_id', $user->id)->where('conversionstatus_id', 6)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->sum('revenue'));

            array_push($leads, $leaddata);
        }

        $data = array('users' => $leads);

        return array(
            'success' => true,
            'data' => view('dashboard.elements.sellers')->with('data', $data)->render(),
        );
    }

}
