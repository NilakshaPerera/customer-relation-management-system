<?php

namespace App\Http\Controllers\campaign;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Campaign;
use App\Campaigntype;
use App\Product;
use Libraries\LogData;

class CampaignController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {


        if (config('constants.roles.administrator') == Auth::user()->role_id) {

            $campType = Campaigntype::all();
            $product = Product::all();
            $data = array('product' => $product, 'camptypes' => $campType);
            return view('campaign.campaign_campaign')->with('data', $data);
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            return view('errors.404');
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            return view('errors.404');
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            return view('errors.404');
        }
    }

    public function refresh(Request $data) {

        if (config('constants.roles.administrator') == Auth::user()->role_id) {
            $campaign = Campaign::all();

            $data = array('campaign' => $campaign);
            return view('campaign.elements.campaigns')->with('data', $data)->render();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            return view('errors.404');
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            return view('errors.404');
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            return view('errors.404');
        }
    }

    public function edit($id) {
        $campaign = Campaign::where('id', $id)->first();
        $campType = Campaigntype::all();
        $product = Product::all();
        try {

            LogData::log('Edit Campaign', 'edit', 'Start');


            $data = array('campaign' => $campaign, 'product' => $product, 'camptypes' => $campType);
            return view('campaign.edit_campaign')->with('data', $data);
        } catch (Exception $ex) {

            LogData::logError('Edit Campaign Error', 'edit', $ex->getMessage());
            return view('errors.ex');
        }
    }

    public function create(Request $data) {

        try {
            LogData::log('Create Campaign', 'create', 'Create Start');

            $validator = Validator::make($data->all(), [
                        'txtname' => 'required',
                        'txtstartdate' => 'required', // |unique:users.empid
                        'txtenddate' => 'required', // unique:users.email| //'required|email|max:255|unique:users.email',
                        'txtcamptype' => 'required',
                        'txtproduct' => 'required', //'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return array(
                    'success' => false,
                    'errors' => $validator->errors(),
                );
            }

            $userData = array(
                'user_id' => Auth::id(),
                'name' => $data['txtname'],
                'started' => $data['txtstartdate'],
                'ended' => $data['txtenddate'],
                'campaigntype_id' => $data['txtcamptype'],
                'product_id' => $data['txtproduct'],
                'active' => 1,
            );

            Campaign::create($userData);
        } catch (Exception $ex) {

            LogData::logError('Create Campaign Error', 'create', $ex->getMessage());

            return array(
                'success' => false,
                'errors' => $ex->getMessage(),
            );
        }

        return array(
            'success' => true,
        );
    }

    public function update(Request $data) {

        try {

            LogData::log('Upadte Campaign', 'update', 'Update Start');

            $validator = Validator::make($data->all(), [
                        'txtname' => 'required',
                        'txtstartdate' => 'required', // |unique:users.empid
                        'txtenddate' => 'required', // unique:users.email| //'required|email|max:255|unique:users.email',
                        'txtcamptype' => 'required',
                        'txtproduct' => 'required', //'required|min:6|confirmed',
                        'hash' => 'required', //'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return array(
                    'success' => false,
                    'errors' => $validator->errors(),
                );
            }

            $userData = array(
                'name' => $data['txtname'],
                'started' => $data['txtstartdate'],
                'ended' => $data['txtenddate'],
                'campaigntype_id' => $data['txtcamptype'],
                'product_id' => $data['txtproduct'],
            );

            Campaign::where('id', $data['hash'])
                    ->update($userData);
        } catch (Exception $ex) {

            LogData::logError('Update Campaign Error', 'update', $ex->getMessage());

            return array(
                'success' => false,
                'errors' => $ex->getMessage(),
            );
        }

        return array(
            'success' => true,
        );
    }

}
