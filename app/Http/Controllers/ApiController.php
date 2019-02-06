<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller {

    public function __construct() {
        // $this->middleware('auth');
    }

    public function createTradeIn(Request $data) {
        
        return $data;
        return array(
            'success' => true,
            'errors' => "Success !!",
        );
    }

}
