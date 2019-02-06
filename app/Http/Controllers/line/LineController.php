<?php

namespace App\Http\Controllers\line;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Line;
use App\User;
use Libraries\LogData;

class LineController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('line.line');
    }

    /**
     * Created By : Nilaksha 
     * Created AT : 16-1-2019
     * Summary : Refreshes the phone lines table in the lines section in the dashboard 
     * @param Request $data
     * @return type
     */
    public function refresh(Request $data) {
        return view('line.elements.lines')->render();
    }

    /**
     * Created By : Nilaksha
     * Created At : 16-1-2019
     * Summary : Creates new line for the agents in the system 
     *           the lines are required to be assigned to an agent created within the system 
     * 
     * @param Request $data
     * @return type
     */
    public function create(Request $data) {

        // txtlinename

        /* txtname txtempid txtemail txtcontact password selbranch selrole  */
        $validator = Validator::make($data->all(), [
                    'number' => 'required|unique:lines',
        ]);

        if ($validator->fails()) {
            return array(
                'success' => false,
                'error' => $validator->errors(),
            );
        }

        $userData = array(
            'number' => $data['number'],
        );

        $user = Line::create($userData);

        return array(
            'success' => true,
            'errors' => '' // $validator->errors()
        );
    }

    /**
     * Created By : Nilaksha
     * Created At : 16-1-2019
     * Summary : Sets a specific caller line ID to a specific agent
     * 
     * @param Request $data
     */
    public function setAgent(Request $data) {

        if (!LogData::isAdmin()) {
            return;
        }

        $validator = Validator::make($data->all(), [
                    'line' => 'required',
                    'user' => 'required',
        ]);

        if ($validator->fails()) {
            return array(
                'success' => false,
                'error' => $validator->errors(),
            );
        }

        $col = 'id';
        $param = $data['user'];
        $line = $data['line'];
        
        if ($data['user'] == 0){
            $col = 'line_id';
            $param = $data['line'];
            $line = 0;
        }

        User::where($col , $param)
                ->update(['line_id' => $line]);

        return array(
            'success' => true,
            'error' => '' // $validator->errors()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
