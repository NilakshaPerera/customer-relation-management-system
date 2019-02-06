<?php

namespace App\Http\Controllers\campaign;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Product;
use Libraries\LogData;

class ProductController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        if (config('constants.roles.administrator') == Auth::user()->role_id) {

            return view('campaign.campaign_products');
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
            $product = Product::all();
            $data = array('products' => $product);
            return view('campaign.elements.products')->with('data', $data)->render();
        } else if (config('constants.roles.branchmanager') == Auth::user()->role_id) {
            return view('errors.404');
        } else if (config('constants.roles.callagent') == Auth::user()->role_id) {
            return view('errors.404');
        } else if (config('constants.roles.marketer') == Auth::user()->role_id) {
            return view('errors.404');
        }
    }

    public function edit($id) {
        try {
            LogData::log('Edit Product', 'edit', 'Start');
            $product = Product::where('id', $id)->first();
            $data = array('products' => $product);
            return view('campaign.edit_products')->with('data', $data);
        } catch (Exception $ex) {
            LogData::logError('Edit Product Error', 'edit', $ex->getMessage());
            return view('errors.ex');
        }
    }

    public function create(Request $data) {

        try {
            $internal = 0;
            LogData::log('Create Product', 'Create', 'Start');
            if (isset($data['txthasinternal'])) {
                $internal = 1;
            }

            $validator = Validator::make($data->all(), [
                        'txtproductname' => 'required',
                        'txtdescription' => 'required',
            ]);

            if ($validator->fails()) {
                return array(
                    'success' => false,
                    'errors' => $validator->errors(),
                );
            }

            $prData = array(
                'user_id' => Auth::id(),
                'name' => $data['txtproductname'],
                'description' => $data['txtdescription'],
                'hasinternal' => (isset($data['txthasinternal'])) ? 1 : 0,
            );

            Product::create($prData);
        } catch (Exception $ex) {
            LogData::logError('Create Product Error', 'edit', $ex->getMessage());
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
        $internal = 0;
        try {

            LogData::log('Update Product', 'Update', 'Start');
            if (isset($data['txthasinternal'])) {
                $internal = 1;
            }

            $user = Auth::user();
            $validator = Validator::make($data->all(), [
                        'txtproductname' => 'required',
                        'txtdescription' => 'required',
                        'hash' => 'required',
            ]);

            if ($validator->fails()) {
                return array(
                    'success' => false,
                    'errors' => $validator->errors(),
                );
            }

            $prData = array(
                'name' => $data['txtproductname'],
                'description' => $data['txtdescription'],
                'hasinternal' => (isset($data['txthasinternal'])) ? 1 : 0,
            );

            Product::where('id', $data['hash'])
                    ->update($prData);
        } catch (Exception $ex) {
            LogData::logError('Update Product Error', 'create', $ex->getMessage());

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
