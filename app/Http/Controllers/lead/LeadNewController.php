<?php

namespace App\Http\Controllers\lead;

use App\LeadDocument;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Campaign;
use App\Branch;
use App\Generallead;
use App\Followup;
use App\Conversionstatus;
use App\Product;
use App\Tradein;
use Libraries\LogData;

class LeadNewController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $campaign = array();
        $branch = array();
        $leads = array();
        $data =null;

        $campaign = Campaign::all();
        $branch = Branch::all();

        if (config('constants.roles.administrator') == Auth::user()->role_id) {
            $data = Generallead::where('conversionstatus_id', '=', 5)->where('branch_id', '<>', NULL)->get();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            $data = Generallead::where('branch_id', Auth::user()->branch_id)->where('agent_id','<>',null)->get();
        } else if ((config('constants.roles.branchagent') == Auth::user()->role_id)) {
            $data = Generallead::where('branch_id', '=',Auth::user()->branch_id )->where('agent_id', '=', Auth::user()->id)->where('conversionstatus_id', '=', 5)->get();
        } else if ((config('constants.roles.callagent') == Auth::user()->role_id)) {
            $data = Generallead::where('conversionstatus_id', '=', 5)->where('branch_id', Auth::user()->branch_id)->where('agent_id', Auth::user()->id)->get(); // agent_id
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            $data = Generallead::where('conversionstatus_id', '=', 5)->where('branch_id', Auth::user()->branch_id)->where('marketer_id', Auth::user()->id)->get();
        }





// $data = array('campaign' => $campaign, 'branch' => $branch, 'leads' => $leads);
            return view('lead.leads_new')->with('data', $data);


    }

    public function create(Request $data) {
        
    }

    public function edit($id) {


        try {
            LogData::log('Edit New Lead Start', 'edit', 'Start');
            $branch = Branch::all();
            $leads = Generallead::where('id', $id)->first();
            $additionlData = Tradein::where('generallead_Id', $id)->first();
            $followUp = Followup::where('generallead_id', $id)->get();

            $convstatus = array();
            if (1) {
                $convstatus = Conversionstatus::all();
            } else {
                $convstatus = Conversionstatus::where('internal', 0)->get();
            }

            $data = array('branch' => $branch, 'leads' => $leads, 'followup' => $followUp, 'convstatus' => $convstatus, 'showForm' => true, 'additional' => $additionlData);
            return view('lead.leads_followup')->with('data', $data);
        } catch (Exception $ex) {
            LogData::logError('Edit New Lead Error', 'edit', $ex->getMessage());
            return view('errors.ex');
        }
    }

    public function followUp(Request $data) {
        try {
            LogData::log('Follow up New Lead Start', 'followUp', 'Start');
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

            if ($data['selstatus'] == 1) {
                $validator = Validator::make($data->all(), [
                            'txtrevenue' => 'required',
                ]);

                if ($validator->fails()) {
                    return array(
                        'success' => false,
                        'errors' => "Please  add a value for revenue.",
                    );
                }

                $flData = array(
                    'generallead_id' => $data['hash'],
                    'comment' => $data['txtdescription'],
                    'conversionstatus_id' => $data['selstatus'],
                    'revenue' => $data['txtrevenue'],
                );

                Followup::create($flData);
                // update lead status
                Generallead::where('id', $data['hash'])
                        ->update(['conversionstatus_id' => $data['selstatus'],
                            'revenue' => $data['txtrevenue']
                ]);
            } else {

                $flData = array(
                    'generallead_id' => $data['hash'],
                    'comment' => $data['txtdescription'],
                    'conversionstatus_id' => $data['selstatus'],
                );
                //Add documents to new table.
                $documents = array(
                    'nic' => $data['nic'],
                    'nic_comment' => $data['nic_comment'],
                    'lead_id'=> $data['lead_id'],
                );

                // create new follow up 
                Followup::create($flData);
                LeadDocument::create($documents);
                // update lead status
                Generallead::where('id', $data['hash'])
                        ->update(['conversionstatus_id' => $data['selstatus']]);
            }
        } catch (Exception $ex) {
            LogData::logError('Follow up New Lead Error', 'followUp', $ex->getMessage());
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
