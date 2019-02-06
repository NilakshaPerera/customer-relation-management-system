<?php

namespace App\Http\Controllers\lead;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Campaign;
use App\Branch;
use App\Generallead;
use App\Followup;
use App\Conversionstatus;
use Libraries\LogData;

class LeadPositiveController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $campaign = Campaign::all();
        $branch = Branch::all();
        $leads = array();


        if (config('constants.roles.administrator') == Auth::user()->role_id) {
           // $leads = Generallead::where('conversionstatus_id', '=', 6)->where('branch_id', '<>', NULL)->get();
            $leads = Generallead::where('conversionstatus_id', '=', 6)->get();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            $leads = Generallead::where('conversionstatus_id', '=', 6)->where('branch_id', '=', Auth::user()->branch_id)->get();

        } else if ((config('constants.roles.callagent') == Auth::user()->role_id) && (1 == Branch::where('id', Auth::user()->branch_id)->first()->main)) {
            return view('errors.404');
        } else if ((config('constants.roles.branchagent') == Auth::user()->role_id) && (0 == Branch::where('id', Auth::user()->branch_id)->first()->main)) {
            $leads = Generallead::where('conversionstatus_id', '=', 6)
                    ->where('branch_id', Auth::user()->branch_id)
                    ->where('agent_id', Auth::user()->id)
                    ->get();
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            $leads = Generallead::where('conversionstatus_id', '=', 6)
                    ->where('branch_id', Auth::user()->branch_id)
                    ->where('marketer_id', Auth::user()->id)
                    ->get();
        }

        $data = array('campaign' => $campaign, 'branch' => $branch, 'leads' => $leads);
        return view('lead.leads_positive')->with('data', $data);
    }

    public function create(Request $data) {
        
    }

    public function edit($id) {
        try {
            LogData::log('Edit Positive Lead Start', 'edit', 'Start');
            $branch = Branch::all();
            $leads = Generallead::where('id', $id)->first();
            $followUp = Followup::where('generallead_id', $id)->get();
            $convstatus = Conversionstatus::all();
            $data = array('branch' => $branch, 'leads' => $leads, 'followup' => $followUp, 'convstatus' => $convstatus, 'showForm' => true);
            return view('lead.leads_followup')->with('data', $data);
        } catch (Exception $ex) {
            LogData::logError('Edit Positive Lead Error', 'edit', $ex->getMessage());
            return view('errors.ex');
        }
    }

    public function followUp(Request $data) {
        try {
            LogData::log('Follow Up Positive Lead Start', 'followUp', 'Start');
            $validator = Validator::make($data->all(), [
                        'selstatus' => 'required',
                        'txtdescription' => 'required',
                        'hash' => 'required',
            ]);

            if ($validator->fails()) {
                return array(
                    'success' => false,
                    'errors' => $validator->errors(),
                );
            }

            $flData = array(
                'generallead_id' => $data['hash'],
                'comment' => $data['txtdescription'],
                'conversionstatus_id' => $data['selstatus'],
            );

            // create new follow up 
            Followup::create($flData);
            // update lead status
            Generallead::where('id', $data['hash'])
                    ->update(['conversionstatus_id' => $data['selstatus']]);
        } catch (Exception $ex) {
            LogData::logError('Follow Up Positive Lead Error', 'followUp', $ex->getMessage());
            return array(
                'success' => false,
                'error' => $ex->getMessage(),
            );
        }
        return array(
            'success' => true,
        );
    }

}
