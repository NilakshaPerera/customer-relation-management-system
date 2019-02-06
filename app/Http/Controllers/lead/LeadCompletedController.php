<?php

namespace App\Http\Controllers\lead;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campaign;
use App\Branch;
use App\Generallead;
use App\Conversionstatus;
use App\Followup;
use Libraries\LogData;

class LeadCompletedController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $campaign = Campaign::all();
        $branch = Branch::all();
        $leads = array();

        if (config('constants.roles.administrator') == Auth::user()->role_id) {
            $leads = Generallead::where('conversionstatus_id', '=', 1)->where('branch_id', '<>', NULL)->get();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            $leads = Generallead::where('conversionstatus_id', '=', 1)->where('branch_id', '<>', NULL)->get();
        } else if ((config('constants.roles.callagent') == Auth::user()->role_id) && (1 == Branch::where('id', Auth::user()->branch_id)->first()->main)) {
            $leads = Generallead::where('conversionstatus_id', '=', 1)->where('branch_id', '<>', NULL)->get();
        } else if ((config('constants.roles.branchagent') == Auth::user()->role_id) && (0 == Branch::where('id', Auth::user()->branch_id)->first()->main)) {
            $leads = Generallead::where('conversionstatus_id', '=', 1)
                    ->where('branch_id', Auth::user()->branch_id)
                    ->where('agent_id', Auth::user()->id)
                    ->get();
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            $leads = Generallead::where('conversionstatus_id', '=', 1)
                    ->where('branch_id', Auth::user()->branch_id)
                    ->where('marketer_id', Auth::user()->id)
                    ->get();
        }

        $data = array('campaign' => $campaign, 'branch' => $branch, 'leads' => $leads);
        return view('lead.leads_processed')->with('data', $data);
    }

    public function create(Request $data) {
        
    }

    public function show($id) {
        try {
            LogData::log('Show Lead', 'show', 'Start');
            $branch = Branch::all();
            $leads = Generallead::where('id', $id)->first();
            $followUp = Followup::where('generallead_id', $id)->get();
            $convstatus = Conversionstatus::all();
            $data = array('branch' => $branch, 'leads' => $leads, 'followup' => $followUp, 'convstatus' => $convstatus, 'showForm' => false);
            return view('lead.leads_followup')->with('data', $data);
        } catch (Exception $ex) {
            LogData::logError('Show Lead Error', 'show', $ex->getMessage());
            return view('errors.ex');
        }
    }

}
