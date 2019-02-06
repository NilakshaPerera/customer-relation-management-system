<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 12/19/2018
 * Time: 9:49 AM
 */

namespace App\Http\Controllers\lead;


use App\Generallead;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
class UnassignedLeadsController
{

    public function index(){
        $unassignedLeads =null;
        $agents =null;
      if((Auth::user()->role_id ==3 )|| (Auth::user()->role_id ==1)){
            $agents =User::where('role_id','=',4)->where('branch_id','=',Auth::user()->branch_id)->get();
            $unassignedLeads = Generallead::where('agent_id','=',null)
                ->where('branch_id','=',Auth::user()->branch_id)->get();
        }else{
          return view('errors.404');
      }





        return view('lead.unassignedLeads')
             ->with('unassignedLeads',$unassignedLeads)
             ->with('agents',$agents);
    }

    public function assignAgent(Request $request){



        $validator = Validator::make($request->all(), [
            'leadId' => 'required',
            'agentId' => 'required',

        ]);
        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->errors(),
            );
        }
        $lead = Generallead::find($request['leadId']);

        $lead->agent_id =$request['agentId'];
     if($lead->save()){
         return redirect()->back();
     }



    }



}