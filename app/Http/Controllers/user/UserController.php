<?php

namespace App\Http\Controllers\user;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Branch;
use App\Role;
use App\User;
use Auth;
use Libraries\LogData;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $extras = '';


        $branches = array();
        $roles = array();
        $adduser = false;
        $edituser = false;

        if (config('constants.roles.administrator') == Auth::user()->role_id) {

            $branches = Branch::all();
            $roles = Role::all();
            $adduser = true;
            $edituser = true;
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            $users = User::where('branch_id', Auth::user()->branch_id)->get();
            $branches = Branch::where('id', Auth::user()->branch_id)->get();
            $roles = Role::where('id', '=', 4)->get();
            $adduser = true;
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            $users = User::where('id', Auth::user()->id)->get();
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            $users = User::where('id', Auth::user()->id)->get();
        }

        $data = array('branches' => $branches, 'roles' => $roles, 'adduser' => $adduser, 'edituser' => $edituser, 'id' => Auth::user()->id, 'extra' => $extras);
        return view('user.manage_users')->with('data', $data);
    }

    public function refresh(Request $data) {

        $users = array();

        $roles = array();
        $adduser = false;
        $edituser = false;

        if (config('constants.roles.administrator') == Auth::user()->role_id) {
            $users = User::all();

            $roles = Role::all();
            $adduser = true;
            $edituser = true;
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            $users = User::where('branch_id', Auth::user()->branch_id)->get();

            $roles = Role::where('id', '>', Auth::user()->role_id)->get();
            $adduser = true;
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            $users = User::where('id', Auth::user()->id)->get();
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            $users = User::where('id', Auth::user()->id)->get();
        }

        $data = array('roles' => $roles, 'users' => $users, 'adduser' => $adduser, 'edituser' => $edituser, 'id' => Auth::user()->id);
        return view('user.elements.users')->with('data', $data)->render();
    }

    public function edit($id) {

        LogData::log('Get branches', 'edit', 'Start');
        $branches = Branch::all();
        $roles = Role::all();
        $users = User::where('id', $id)->first();

        $data = array('branches' => $branches, 'roles' => $roles, 'users' => $users);
        return view('user.edit_users')->with('data', $data);
    }

    ///Create user with gives data 
    public function create(Request $data) {

        try {
            $passwrod = $data['txtpassword'];
            LogData::log('Create user', 'create', 'Start');
            /* txtname txtempid txtemail txtcontact password selbranch selrole  */
            $validator = Validator::make($data->all(), [
                        'txtname' => 'required',
                        'txtempid' => 'required|max:255', // |unique:users.empid
                        'txtemail' => 'required|email|max:255', // unique:users.email| //'required|email|max:255|unique:users.email',
                        'txtcontact' => 'required|max:12',
                        'txtpassword' => 'required', //'required|min:6|confirmed',
                        'selbranch' => 'required',
                        'selrole' => 'required',
            ]);

            if ($validator->fails()) {
                return array(
                    'success' => false,
                    'errors' => $validator->errors(),
                );
            }

            // Create a user 
            $userData = array(
                'role_id' => $data['selrole'],
                'branch_id' => $data['selbranch'],
                'name' => $data['txtname'],
                'email' => $data['txtemail'],
                'contact' => $data['txtcontact'],
                'empid' => $data['txtempid'],
                'password' => bcrypt($passwrod),
            );

            $user = User::create($userData);
            $user->sendWelcomeMessage(array( 'username' => $data['txtemail'] , 'password' => $passwrod , 'url' => url('login') ));
            
        } catch (Exception $ex) {
            LogData::logError('Create user Error', 'edit', $ex->getMessage());
            return array(
                'success' => false,
                'errors' => $ex->getMessage(),
            );
        }

        return array(
            'success' => true,
        );
    }

    public function getBranches() {
        try {
            $branches = Branch::all();
            if (count($branches)) {
                return response()->json(array(
                            'data' => array(
                                'success' => true,
                                'message' => 'Query successfull',
                                'data' => $branches,
                )));
            } else {
                return response()->json(array(
                            'data' => array(
                                'success' => false,
                                'message' => 'No data available',
                                'data' => null,
                )));
            }
        } catch (Exception $ex) {
            return response()->json(array(
                        'data' => array(
                            'success' => false,
                            'message' => 'Error occured',
                            'data' => null,
            )));
        }
    }

    public function getRoles() {
        try {
            $roles = Role::all();
            if (count($roles)) {
                return response()->json(array(
                            'data' => array(
                                'success' => true,
                                'message' => 'Query successfull',
                                'data' => $roles,
                )));
            } else {
                return response()->json(array(
                            'data' => array(
                                'success' => false,
                                'message' => 'No data available',
                                'data' => null,
                )));
            }
        } catch (Exception $ex) {
            return response()->json(array(
                        'data' => array(
                            'success' => false,
                            'message' => 'Error occured',
                            'data' => null,
            )));
        }
    }

    public function update(Request $data) {

        LogData::log('Update user', 'update', 'Start');

        $validator = Validator::make($data->all(), [
                    'txtname' => 'required',
                    'txtempid' => 'required|max:255', // |unique:users.empid
                    'txtemail' => 'required|email|max:255', // unique:users.email| //'required|email|max:255|unique:users.email',
                    'txtcontact' => 'required|max:12',
                    //'txtpassword' => 'required',
                    'selbranch' => 'required',
                    'selrole' => 'required',
        ]);

        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->errors(),
            );
        }

        $userData = array(
            'role_id' => $data['selrole'],
            'branch_id' => $data['selbranch'],
            'name' => $data['txtname'],
            'email' => $data['txtemail'],
            'contact' => $data['txtcontact'],
            'empid' => $data['txtempid'],
        );

        User::where('id', $data['hash'])
                ->update($userData);

        return array(
            'success' => true,
        );
    }

    public function changePasswordForm() {
        return view('auth.changepassword');
    }

    public function changePassword(Request $request) {

        try {
            LogData::log('Change password attempt', 'changePassword', 'Start');
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {

                return redirect()->back()->with("error", "Your current password does not match with the password you provided. Please try again. ");
            }
            if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
                //Current password and new password are same
                return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
            }

            $validator = Validator::make($request->all(), [
                        'current-password' => 'required',
                        'new-password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with("error", "Make sure the new password has more than 6 charactors.");
            }

            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
            LogData::log('Change password Success', 'changePassword', 'Start');
            return redirect()->back()->with("success", "Password changed successfully !");
        } catch (Exception $ex) {
            LogData::logError('Change password Error', 'changePassword', $ex->getMessage());
            return redirect()->back()->with("error", "An unexpected error has occured.");
        }
    }
    
     /**
     * Created By : Nilaksha 
     * Created At : 9-1-2018
     * Summary : MArk the active and non active state of a user;
     * @param Request $request
     * @return type
     */
    public function activate(Request $request) {
        
        if(!LogData::isAdmin()){
            return;
        }
        
        User::where('id' , $request['id']) 
                ->update(['active' => $request['state'] ]);
        
        return array(
            'success' => true,
        );
    }

}
