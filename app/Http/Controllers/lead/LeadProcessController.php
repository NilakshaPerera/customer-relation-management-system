<?php

namespace App\Http\Controllers\lead;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campaign;
use App\Branch;
use App\Generallead;
use App\Followup;
use App\Conversionstatus;
use Libraries\LogData;

class LeadProcessController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $campaign = Campaign::all();
        $branch = Branch::all();
        $leads = array();

        if (config('constants.roles.administrator') == Auth::user()->role_id) {
            $leads = Generallead::where('branch_id', '<>', NULL)
                    ->where(function($query) {
                        $query->where('conversionstatus_id', '=', 3)
                        ->orWhere('conversionstatus_id', '=', 7)
                        ->orWhere('conversionstatus_id', '=', 8)
                        ->orWhere('conversionstatus_id', '=', 9)
                        ->orWhere('conversionstatus_id', '=', 10);
                    })
                    ->get();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            $leads = Generallead::where('branch_id', Auth::user()->branch_id)
                ->where(function($query) {
                    $query->where('conversionstatus_id', '=', 3)
                        ->orWhere('conversionstatus_id', '=', 7)
                        ->orWhere('conversionstatus_id', '=', 8)
                        ->orWhere('conversionstatus_id', '=', 9)
                        ->orWhere('conversionstatus_id', '=', 10);
                })
                ->get();
        } else if ((config('constants.roles.callagent') == Auth::user()->role_id) && (1 == Branch::where('id', Auth::user()->branch_id)->first()->main)) {
            return view('errors.404');
        } else if ((config('constants.roles.branchagent') == Auth::user()->role_id) && (0 == Branch::where('id', Auth::user()->branch_id)->first()->main)) {
            $leads = Generallead::where('branch_id', Auth::user()->branch_id)
                ->where(function($query) {
                    $query->where('conversionstatus_id', '=', 3)
                        ->orWhere('conversionstatus_id', '=', 7)
                        ->orWhere('conversionstatus_id', '=', 8)
                        ->orWhere('conversionstatus_id', '=', 9)
                        ->orWhere('conversionstatus_id', '=', 10);
                })
                ->get();

        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {

            $leads = Generallead::where('branch_id', Auth::user()->branch_id)
                    ->where('marketer_id', Auth::user()->id)
                    ->where(function($query) {
                        $query->where('conversionstatus_id', '=', 3)
                        ->orWhere('conversionstatus_id', '=', 7)
                        ->orWhere('conversionstatus_id', '=', 8)
                        ->orWhere('conversionstatus_id', '=', 9)
                        ->orWhere('conversionstatus_id', '=', 10);
                    })
                    ->get();
        }

        $data = array('campaign' => $campaign, 'branch' => $branch, 'leads' => $leads);
        return view('lead.leads_inprogress')->with('data', $data);
    }

    public function create(Request $data) {
        
    }

    public function edit($id) {

        try {
            LogData::log('Edit In Progress Lead Start', 'edit', 'Start');
            $branch = Branch::all();
            $leads = Generallead::where('id', $id)->first();
            $followUp = Followup::where('generallead_id', $id)->get();

            $convstatus = array();
            if ($leads->campaign->product->hasinternal) {
                $convstatus = Conversionstatus::all();
            } else {
               // $convstatus = Conversionstatus::where('internal', 0)->get();
                $convstatus = Conversionstatus::all();
            }

            $data = array('branch' => $branch, 'leads' => $leads, 'followup' => $followUp, 'convstatus' => $convstatus, 'showForm' => true);
            return view('lead.leads_followup')->with('data', $data);
        } catch (Exception $ex) {
            LogData::logError('Edit In Progress Lead Error', 'edit', $ex->getMessage());
            return view('errors.ex');
        }
    }

}
