<?php

namespace App\Http\Controllers\lead;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campaign;
use App\Branch;
use App\Generallead;
use Libraries\LogData;

class LeadSetBranchController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id) {
        
    }

    public function setbranch(Request $data) {

        $userId = Auth::id();

        try {
            LogData::log('Set branch to a lead Lead Start', 'setbranch', 'Start');
            if (!$data['selbranch']) {
                return array(
                    'success' => false,
                    'errors' => 'Please select a branch.',
                );
            }

            if (!$data['hash']) {
                return array(
                    'success' => false,
                    'errors' => 'An error occured.',
                );
            }

            // TODO 
            // SET A MARKETER WHILE UPDATING THE BRANCH 

            Generallead::where('id', $data['hash'])
                    ->update(['branch_id' => $data['selbranch']]);
        } catch (Exception $ex) {
            LogData::logError('Set branch to a lead Lead Error', 'setbranch', $ex->getMessage());
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
