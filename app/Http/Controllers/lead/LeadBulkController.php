<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Controller;
use App\Campaign;
use App\Branch;
use App\Generallead;


class LeadBulkController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $campaign = Campaign::all();
        $branch = Branch::all();
        $leads = Generallead::all();
        $data = array('campaign' => $campaign, 'branch' => $branch, 'leads' => $leads);
        return view('lead.leads_bulkadd')->with('data', $data);
    }
    

}
