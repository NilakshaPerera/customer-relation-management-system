<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\City;
use App\Branch;
use Auth;
use Libraries\LogData;

class BranchController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        if (config('constants.roles.administrator') == Auth::user()->role_id) {

            $cities = City::all();
            $data = array('cities' => $cities);
            return view('user.manage_branches')->with('data', $data);
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
            $branches = self::getBranches();
            $data = array('branches' => $branches);
            return view('user.elements.branches')->with('data', $data)->render();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            return view('errors.404');
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            return view('errors.404');
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            return view('errors.404');
        }
    }

    public function getBranches($id = null) {
        /*
          name city_id  covercity_id created_at updated_at
         */
        LogData::log('Get branches', 'getBranches', 'Start');
        $i = 0;

        $branches = array();
        if ($id == null) {
            $branches = Branch::all();
        } else {
            $branches = Branch::where('id', $id)->first();
        }

        $tempDatabase = $branches;
        foreach ($branches as $branch) {
            if ($branch['covercity_id']) {
                $cities = array();
                $cityarray = explode(',', $branch['covercity_id']);
                foreach ($cityarray as $cityId) {
                    if (City::find($cityId)) {
                        array_push($cities, City::find($cityId)->name);
                    }
                }
                $tempDatabase[$i]['covercity_id'] = implode(', ', $cities);
            }
            ++$i;
        }
        return $tempDatabase;
    }

    public function create(Request $data) {

        LogData::log('Create branch', 'create', 'Start');
        if (!$data['covercities']) {
            return array(
                'success' => false,
                'errors' => array('Please assign cities as cover areas.'),
            );
        }

        $covCityList = $data['covercities'];
        $coverArray = json_decode($covCityList);
        $coverArray = implode(", ", $coverArray);

        $validator = Validator::make($data->all(), [
                    'txtbranchname' => 'required',
                    'selcity' => 'required',
                    'covercities' => 'required',
        ]);

        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->errors(),
            );
        }
        $brData = array(
            'name' => $data['txtbranchname'],
            'city_id' => $data['selcity'],
            'covercity_id' => $coverArray,
        );

        Branch::create($brData);
        return array(
            'success' => true,
        );
    }

    /**
     * Created By : Nilaksha 
     * Created At : 15-12-2018
     * Summary : Update a branch. User is only allowed to change covered areas
     * @param Request $data
     * @return type
     */
    public function update(Request $data) {
        LogData::log('Update branch', 'create', 'Start');

        if (!$data['covercities']) {
            return array(
                'success' => false,
                'errors' => array('Please assign cities as cover areas.'),
            );
        }

        $covCityList = $data['covercities'];
        $coverArray = json_decode($covCityList);
        $coverArray = implode(", ", $coverArray);

        $validator = Validator::make($data->all(), [
                    'txtbranchname' => 'required',
                    'selcity' => 'required',
                    'covercities' => 'required',
        ]);

        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->errors(),
            );
        }

        $brData = array(
            'name' => $data['txtbranchname'],
            'city_id' => $data['selcity'],
            'covercity_id' => $coverArray,
        );

        Branch::where('city_id' ,  $data['selcity'] )
                ->update(['name' => $data['txtbranchname'] , 'covercity_id' => $coverArray]);
        
        return array(
            'success' => true,
        );
    }

    public function edit($id) {

        LogData::log('Edit branch', 'edit', 'Start');
        $branches = self::getBranches($id);
        $cities = City::all();

        $data = array('branches' => $branches, 'cities' => $cities);
        return view('user.edit_branches')->with('data', $data);
    }

    public function cities(Request $data) {

        $data = City::where('id', '!=', '')->orderBy('name', 'ASC')->get();

        return [
            'success' => true,
            'data' => $data
        ];
    }
    
     /**
     * Created By : Nilaksha
     * Created At : 8-1-2018
     * Summary : Checks of user Input is available or create a new city.
     * @param Request $data
     */
    public function addCity(Request $data) {

        $validator = Validator::make($data->all(), [
                    'name' => 'required|unique:cities',
        ]);

        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->errors(),
            );
        }

        $data = array(
            'name' => strtoupper($data['name'])
        );
        City::create($data);

        return [
            'success' => true,
            'data' => '',
        ];
    }

}

/*
         if (config('constants.roles.administrator') == Auth::user()->role_id) {
            
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            
        } 
 */
