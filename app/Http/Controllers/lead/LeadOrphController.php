<?php

namespace App\Http\Controllers\lead;

use Illuminate\Support\Facades\Auth;
//use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campaign;
use App\Branch;
use App\Generallead;
use App\User;
use Libraries\LogData;

class LeadOrphController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $campaign = array();
        $branch = array();
        $leads = array();

        if (config('constants.roles.administrator') == Auth::user()->role_id) {
            $campaign = Campaign::all();
            $branch = Branch::all();
            $leads = Generallead::where('branch_id', NULL)->get();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            return view('errors.404');
        } else if ((config('constants.roles.callagent') == Auth::user()->role_id) && (1 == Branch::where('id', Auth::user()->branch_id)->first()->main)) {
            $campaign = Campaign::all();
            $branch = Branch::all();
            $leads = Generallead::where('branch_id', NULL)->get();
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            return view('errors.404');
        } else {
            return view('errors.404');
        }

        $data = array('campaign' => $campaign, 'branch' => $branch, 'leads' => $leads);
        return view('lead.leads_orphaned')->with('data', $data);
    }

    public function edit($id = null) {
        try {
            LogData::log('Set Orphaned Lead Start', 'edit', 'Start');
            $branch = Branch::all();
            $leads = Generallead::where('id', $id)->first();
            $data = array('branch' => $branch, 'leads' => $leads);
            return view('lead.leads_setbranch')->with('data', $data);
        } catch (Exception $ex) {
            LogData::logError('Set Orphaned Lead Error', 'edit', $ex->getMessage());
            return view('errors.ex');
        }
    }

    public function show($id) {
        return "show";
    }

    public function setBranch($data) {
        // return view('lead\leads_setbranch');
        return $data;
    }

}
