<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 12/26/2018
 * Time: 1:12 PM
 */

namespace App\Http\Controllers\lead;


use App\Generallead;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AllLeadsController extends Controller{


         public function index()
         {
             $allLeads =0;
              if(config('constants.roles.administrator') == Auth::user()->role_id){
                  $allLeads =Generallead::all();
              }else if(config('constants.roles.branchmanager') == Auth::user()->role_id){
                  $allLeads =Generallead::where('branch_id','=',Auth::user()->branch_id)->get();
              }else {
                  return view('errors.404');
              }


             $data = array('leads' => $allLeads);
             return view('lead.all_leads')->with('data',$data);
         }

}

