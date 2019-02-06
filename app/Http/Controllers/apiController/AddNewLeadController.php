<?php
namespace App\Http\Controllers\apiController;

use App\IncommingLeads;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Line;
use Libraries\LogData;

class AddNewLeadController extends Controller {

    /**
     * Created By : Unknown
     * Created At : Unknown
     * Summary : Accepts the API requests externally and populate data into the system database.
     * 
     * Updated By : Nilaksha 
     * Updated On : 14-1-2019
     * Summary : Introducing separate table to store line numbers and validate line numbers before populating into the database
     * 
     * @param type $phone
     * @param type $id
     * @return type
     */
    public function incomingLead($phone, $id) {
        
        $validator = Validator::make(array('phone' => $phone, 'id' => $id), [
                    'phone' => 'required',
                    'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false , 'message' => 'error']);
        } else {

            $line = Line::where('number', $id)->first();
            if (!$line) {
                LogData::logError('Add Incoming Lead', 'incomingLead', 'This line is not available in the system :'. $id);
                return response()->json(['success' => false , 'message' => 'This line is not available in the system :'. $id]);
            }

            $user = $line->user;
            if (!$user) {
                LogData::logError('Add Incoming Lead', 'incomingLead', 'This line is not assiged to any user :'. $id);
                return response()->json(['success' => false , 'message' => 'This line is not assiged to any user :'. $id]);
            }

            $incommingLead = array(
                'telnumber' => $phone,
                'agent_id' => $user->id,
                'line_id' => $line->id,
                'active' => 1
            );

            IncommingLeads::create($incommingLead);
            return response()->json(['success' => true , 'message' => 'Data was successfully submitted']);
        }
    }

}
