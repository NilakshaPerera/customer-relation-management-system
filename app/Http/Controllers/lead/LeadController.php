<?php

namespace App\Http\Controllers\lead;

use App\Client;
use App\Complain;
use App\IncommingLeads;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use Validator;
use App\Campaign;
use App\Branch;
use App\Generallead;
use App\User;
use App\Mail\InformLeads;
use App\Tradein;
use Libraries\LogData;
use App\Conversionstatus;
use App\Followup;

class LeadController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $branch = array();
        $leads = array();
        $product = Product::all();
        $campaign = Campaign::all();

        if (config('constants.roles.administrator') == Auth::user()->role_id) {
            $branch = Branch::all();
            $leads = Generallead::all();
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            $branch = Branch::all();
            $leads = Generallead::all();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            $branch = Branch::all();
            $leads = Generallead::where('branch_id', Auth::user()->branch_id)->get();
        } else if (config('constants.roles.branchagent') == Auth::user()->role_id) {
            $branch = Branch::all();
            $leads = Generallead::where('user_id', '=', Auth::user()->id)->get();
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            $branch = Branch::where('id', Auth::user()->branch_id)->get();
            $leads = Generallead::where('branch_id', Auth::user()->branch_id)
                    ->where('marketer_id', Auth::user()->id)
                    ->get();
        }

        $data = array('campaign' => $campaign, 'products' => $product, 'branch' => $branch, 'leads' => $leads);
        return view('lead.leads_add')->with('data', $data);
    }

    public function refresh(Request $data) {


        $leads = array();

        if (config('constants.roles.administrator') == Auth::user()->role_id) {
            $leads = Generallead::all();
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            $leads = Generallead::all();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            $leads = Generallead::where('branch_id', Auth::user()->branch_id)->get();
        } else if (config('constants.roles.branchagent') == Auth::user()->role_id) {
            $leads = Generallead::where('user_id', '=', Auth::user()->id)->get();
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {

            $leads = Generallead::where('branch_id', Auth::user()->branch_id)
                    ->where('marketer_id', Auth::user()->id)
                    ->get();
        }

        $data = array('leads' => $leads);
        return view('lead.elements.freshleads')->with('data', $data)->render();
    }

    public function create(Request $data) {

        try {
            LogData::log('Create Lead', 'Create', 'Start');

            self::addGenerallLead($data);
        } catch (Excption $ex) {
            LogData::logError('Create Lead Error', 'create', $ex->getMessage());
            return array(
                'success' => false,
                'error' => $ex->getMessage(),
            );
        }
        return array(
            'success' => true,
        );
    }

    /**
     * Created by : Nilaksha 
     * Created at  : 8-1-2019
     * Summary : adding a new lead to general leads
     * @param type $data
     * @return type
     */
    public function addGenerallLead($data) {



        $validator = Validator::make($data->all(), [
                    'txtname' => 'required',
                    'txtcontact' => 'required',
                    'txtnic' => 'required',
                    'txtemail' => 'required',
                    'selbranch' => 'required',
                    'selproduct' => 'required',
                    'selcampaign' => 'required',
                    'txtcomment' => 'required'
        ]);

        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->errors()
            );
        }

        $agentId = null;
        $marketerId = null;
        $branchId = ($data['selbranch'] > 0) ? $data['selbranch'] : null;

//        if ($branchId != null) {
//
//            $assigneeData = self::getUsersByBranchId($data['selbranch']);
//
//            if (array_key_exists('error', $assigneeData)) {
//                return array(
//                    'success' => false,
//                    'errors' => $assigneeData['errors'],
//                );
//            }
//
//            foreach ($assigneeData['agents'] as $agent) {
//                $agentId = $agent->id;
//            }
//
//            foreach ($assigneeData['marketer'] as $marketer) {
//                $marketerId = $marketer->id;
//            }
//        }

        $productId = Campaign::where('id', $data['selcampaign'])->first();

        // user_id  conversionstatus_id  status_id branch_id campaign_id

        $clientData = array(
            'name' => $data['txtname'],
            'phone' => $data['txtcontact'],
            'email' => $data['txtemail'],
            'phone_2' => $data['txtcontact2'],
            'phone_home' => $data['txthomecontact'],
            'phone_office' => $data['txtOfficecontact'],
            'nic'=>$data['txtnic']

        );
        $phone =$data['txtcontact'];
        $phone_2 = $data['txtcontact2'];
        $phone_home =$data['txthomecontact'];
        $phone_office =$data['txtOfficecontact'];

        $existingUser = Client::where(function($query) use ($phone,$phone_2,$phone_home,$phone_office){
            $query->orWhere('phone',$phone)
                    ->orWhere('phone_2',$phone_2)
                    ->orWhere('phone_home',$phone_home)
                    ->orWhere('phone_office',$phone_office);

        })->first();
        $newClient = null;
        if (empty($existingUser)) {
            $newClient = Client::create($clientData);
        } else {
            $existingUser->name =$data['txtnic'];
            $existingUser->nic =$data['txtname'];
            $existingUser->phone = $data['txtcontact'];
            $existingUser->phone_2 = $data['txtcontact2'];
            $existingUser->phone_home = $data['txthomecontact'];
            $existingUser->phone_office = $data['txtOfficecontact'];


             $existingUser->save();
            $newClient =$existingUser;

        }

        $brData = array(
            'user_id' => Auth::id(),
            'agent_id' => $agentId,
            'marketer_id' => $marketerId,
            'phone' => $data['txtcontact'],
            'nic' => $data['txtnic'],
            'comment' => $data['txtcomment'],
            'conversionstatus_id' => 5,
            'status_id' => 0,
            'client_id' => $newClient->id,
            'branch_id' => $branchId,
            'campaign_id' => $data['selcampaign'],
            'product_id' => $data['selproduct'],
        );




        $submitedLead = Generallead::create($brData);
        try {
            $branchManagers = User::where('branch_id', $data['selbranch'])->where('role_id', 3)->get();


            foreach ($branchManagers as $bankManager) {
                if (!empty($bankManager)) {
                    Mail::to($bankManager->email)->send(new InformLeads($submitedLead->id));
                }
            }
        } catch (\Exception $e) {
            
        }


        return $submitedLead;
    }

    /// Bulk creates the Leads input in to the database 
    public function bulkCreate(Request $data) {
        try {
            LogData::log('Bulk Create Lead', 'bulkCreate', 'Start');
            $validator = Validator::make($data->all(), [
                        'selbulkbranch' => 'required',
                        'selbulkcampaign' => 'required',
            ]);

            if ($validator->fails()) {
                return array(
                    'success' => false,
                    'errors' => $validator->errors(),
                );
            }

            $brId = $data['selbulkbranch'];

            // return $brId;
            $campId = $data['selbulkcampaign'];
            $productId = Campaign::where('id', $campId)->first();

            if ($data->hasFile('fileexcel')) {
                $path = $data->file('fileexcel')->getRealPath();
                $data = \Excel::load($path)->get();

                if ($data->count()) {

                    $agentId = null;
                    $marketerId = null;
                    $agentIdArray = array();
                    $marketerIdArray = array();
                    $insData = array();
                    $branchId = ($brId > 0) ? $brId : null;
                    //    return;
                    if ($branchId != null) {
                        $assigneeData = self::getUsersByBranchId($brId);

                        if (array_key_exists('error', $assigneeData)) {
                            return array(
                                'success' => false,
                                'errors' => $assigneeData['errors'],
                            );
                        }

                        foreach ($assigneeData['agents'] as $agent) {
                            $agentId = $agent->id;
                            array_push($agentIdArray, $agent->id);
                        }

                        foreach ($assigneeData['marketer'] as $marketer) {
                            $marketerId = $marketer->id;
                            array_push($marketerIdArray, $marketer->id);
                        }
                    }

                    $agntInc = 0;
                    $mrktInc = 0;

                    foreach ($data as $value) {

                        if ($branchId != null) {

                            if ((count($agentIdArray) - 1) == $agntInc) {
                                $agntInc = 0;
                            } else {
                                ++$agntInc;
                            }

                            $agentId = $agentIdArray[$agntInc];

                            if ((count($marketerIdArray) - 1) == $mrktInc) {
                                $mrktInc = 0;
                            } else {
                                ++$mrktInc;
                            }

                            $marketerId = $marketerIdArray[$mrktInc];
                        }


                        $phone = ($value->phone_number) ? str_replace('p:', '', $value->phone_number) : '';
                        $row = array(
                            'user_id' => Auth::id(),
                            'agent_id' => $agentId,
                            'marketer_id' => $marketerId,
                            'name' => $value->full_name,
                            'phone' => $phone,
                            'email' => $value->email,
                            'conversionstatus_id' => 5,
                            'status_id' => 0,
                            'branch_id' => $branchId,
                            'campaign_id' => $campId,
                            'product_id' => $productId->product_id,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        );
                        array_push($insData, $row);
                    }
                    //            }
                    if (!empty($insData)) {
                        Generallead::insert($insData);
                    }
                } else {
                    return array(
                        'success' => false,
                        'errors' => 'Please select a file with data.',
                    );
                }
            } else {
                return array(
                    'success' => false,
                    'errors' => 'Please select a valid file.',
                );
            }
        } catch (Exception $ex) {
            LogData::logError('Bulk Create Lead Error', 'bulkCreate', $ex->getMessage());
            return array(
                'success' => false,
                'error' => $ex->getMessage(),
            );
        }
        return array(
            'success' => true,
        );
    }

    // Returns the marketers and call agents assigned to a particular branch
    public function getUsersByBranchId($branchId) {
        $agentData = array();
        $marketerData = array();
        try {
            LogData::log('Get user by branch', 'getUsersByBranchId', 'Start');

            try {
                $branch = Branch::where('id', $branchId)->first();

                if (!$branch) {
                    return array(
                        'success' => false,
                        'errors' => "There are no branches defined.",
                    );
                }

                $agentData = User::where('branch_id', $branchId)->where('role_id', 4)->get();
                $marketerData = User::where('branch_id', $branchId)->where('role_id', 5)->get();
            } catch (Exception $ex) {
                LogData::logError('Get user by branch Error', 'getUsersByBranchId', $ex->getMessage());

                return array(
                    'success' => false,
                    'errors' => "There are no branches defined.",
                    'errordata' => $ex->getMessage(),
                );
            }
        } catch (Exception $ex) {
            LogData::logError('Get user by branch Error', 'getUsersByBranchId', $ex->getMessage());
            return array(
                'success' => false,
                'error' => $ex->getMessage(),
                'errordata' => $ex->getMessage(),
            );
        }

        return array(
            'success' => true,
            'agents' => $agentData,
            'marketer' => $marketerData,
        );
    }

    // Create trade in leads and add entry to trade in table withvalues
    public function createTradeIn(Request $data) {
        try {

            // Api string
            /*
              'txtname' => 'required',
              'txtcontact' => 'required',
              'txtemail' => 'required',
              'selbranch' => 'null',
              'selcampaign' => 'required',
              'txtoldcar' => 'required'
              'txtoldcarvalue' => 'required'
              'txtnewcar' => 'required'
              'txtnewcarvalue' => 'required'
             */

            LogData::log('Create trade in lead from API', 'createTradeIn', 'Start');

            $result = self::addGenerallLead($data);

            if ($result) {

                $tradeIn = array(
                    'generallead_Id' => $result->id,
                    'oldcar' => $data['txtoldcar'],
                    'oldcarvalue' => $data['txtoldcarvalue'],
                    'newcar' => $data['txtnewcar'],
                    'newcarvalue' => $data['txtnewcarvalue'],
                );

                Tradein::create($tradeIn);
            }
        } catch (Exception $ex) {
            LogData::logError('Create trade in lead from API', 'createTradeIn', $ex->getMessage());

            return array(
                'success' => false,
                'error' => $ex->getMessage(),
            );
        }
        return array(
            'success' => true,
        );
    }

    public function getIncammingLeqdDetail(Request $request) {
        if (config('constants.roles.callagent') == Auth::user()->role_id) {

            $checkExist = null;
            $lead = IncommingLeads::where('agent_id', Auth::user()
                            ->id)->where('active', 1)
                    ->where('seen', 0)
                    ->first();

            if (!empty($lead)) {

                $callingNumber =$lead->telnumber;
                $checkExist = Client::where(function($query) use ($callingNumber) {
                    $query->orWhere('phone', $callingNumber)
                        ->orWhere('phone_2', $callingNumber)
                        ->orWhere('phone_home', $callingNumber)
                        ->orWhere('phone_office', $callingNumber);
                })->first();

                if (!empty($checkExist)) {

                    $branch = Branch::all();
                    $product = Product::all();
                    $campaign = Campaign::all();
                    $leads = Generallead::where('client_id', $checkExist->id)->get();
                    $convstatus = Conversionstatus::all();
                    $followUp = Followup::where('generallead_id', $checkExist->id)->get();
                    $data = array('branch' => $branch, 'product' => $product, 'campaign' => $campaign, 'user' => $checkExist,'incomingCallId'=>$lead->id, 'callerNumber' => $lead->telnumber,
                        'leads' => $leads, 'followup' => $followUp, 'convstatus' => $convstatus,
                    );
                    return  array("template"=> view('lead.existUser')->with('data', $data)->render(),"incomingCallid"=>$lead->id)  ;
                } else {

                    $branch = Branch::all();
                    $product = Product::all();
                    $campaign = Campaign::all();
                    $data = array('branch' => $branch, 'product' => $product, 'campaign' => $campaign, 'user' => $checkExist,'incomingCallId'=>$lead->id, 'callerNumber' => $lead->telnumber);

                    return  array("template"=> view('lead.existUser')->with('data', $data)->render(),"incomingCallid"=>$lead->id)  ;
                }
            } else {
                return "noleads";
            }
        }
    }

    public function submitcomment(Request $request) {

        $validator = Validator::make($request->all(), [
                    'lead_id' => 'required',
                    'client_id' => 'required',
                    'comment' => 'required',
        ]);



        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->errors(),
            );
        }

        $brData = array(
            'lead_id' => $request['lead_id'],
            'client_id' => $request['client_id'],
            'complain' => $request['comment']
        );


        $complain = Complain::create($brData);

        if ($complain) {
            return array(
                'success' => true,
            );
        } else {
            return array(
                'success' => false,
            );
        }
    }

    public function  updateSeen(Request $request){
        $validator = Validator::make($request->all(), [

            'id'=>'required'

        ]);

        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->errors(),
            );
        }

       $inlcomingCall =IncommingLeads::find($request['id']);
        $inlcomingCall->seen =1;

  if($inlcomingCall->save()){
      return "success updated seen" ;
  }else {
      return "fail updated seen";
  }

    }

}
