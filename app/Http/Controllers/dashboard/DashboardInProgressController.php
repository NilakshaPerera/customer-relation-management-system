<?php

namespace App\Http\Controllers\dashboard;

use App\Generallead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class DashboardInProgressController extends Controller {

        public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('dashboard.inprogressrun');
    }

    public function refresh(Request $request) {

        $products = array();
        $prodList = array();
        try {
            $products = Product::where('active', 1)->
where('hasinternal' , 1)->get();

            foreach ($products as $product) {

                $totalMarketingValue = 100;
                $creditstatLeadsValue = 100;
                $operationLeadsValue = 100;
                $financeLeadsValue = 100;

                // Total Marketing 
                $before7Days = count($product->generallead->where('created_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 7));
                $within7Days = count($product->generallead->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 7));

                if ($before7Days > 0 && $within7Days > 0) {
                    $totalMarketingValue = ($within7Days * 100) / $before7Days;
                } else if (!$within7Days) {
                    $totalMarketingValue = 0;
                }

                // Total Credit
                $creditBefore7Days = count($product->generallead->where('updated_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 8));
                $creditWithin7Days = count($product->generallead->where('updated_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 8));

                if ($creditBefore7Days > 0 && $creditWithin7Days > 0) {
                    $creditstatLeadsValue = ($creditWithin7Days * 100) / $creditBefore7Days;
                } else if (!$creditWithin7Days) {
                    $creditstatLeadsValue = 0;
                }

                // Total Operation
                $operationBefore7Days = count($product->generallead->where('updated_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 9));
                $operationWithin7Days = count($product->generallead->where('updated_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 9));

                if ($operationBefore7Days > 0 && $operationWithin7Days > 0) {
                    $operationLeadsValue = ($operationWithin7Days * 100) / $operationBefore7Days;
                } else if (!$operationWithin7Days) {
                    $operationLeadsValue = 0;
                }

                // Total Finance 
                $financeBefore7Days = count($product->generallead->where('updated_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 10));
                $financeWithin7Days = count($product->generallead->where('updated_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 10));

                if ($financeBefore7Days > 0 && $financeWithin7Days > 0) {
                    $financeLeadsValue = ($financeWithin7Days * 100) / $financeBefore7Days;
                } else if (!$financeWithin7Days) {
                    $financeLeadsValue = 0;
                }
                $totalLeads = Generallead::where('id','<>',null)->get()->toArray();

                $countleads =0;
                $countCredit =0;
                $countOperation =0;
                $countFinance =0;

                if((config('constants.roles.administrator') == Auth::user()->role_id)){
                    $countleads =count($product->generallead->where('branch_id','<>',null));
                }else if((config('constants.roles.branchmanager') == Auth::user()->role_id)){
                    $countleads =count($product->generallead->where('branch_id','=',Auth::user()->branch_id));
                }else if((config('constants.roles.branchagent') == Auth::user()->role_id)){
                    $countleads =count($product->generallead->where('branch_id','=',Auth::user()->branch_id));
                }


                $prod = array(
                    'allLeads'=> $countleads,
                    'prodname' => $product->name,
                    'totalmarketing' => count($product->generallead->where('conversionstatus_id', 7)),
                    'totalmarketingstat' => array('raise' => true, 'value' => $totalMarketingValue),
                    'credit' => count($product->generallead->where('conversionstatus_id', 8)),
                    'creditstat' => array('raise' => true, 'value' => $creditstatLeadsValue),
                    'operation' => count($product->generallead->where('conversionstatus_id', 9)),
                    'operationstat' => array('raise' => true, 'value' => $operationLeadsValue),
                    'finance' => count($product->generallead->where('conversionstatus_id', 10)),
                    'financestat' => array('raise' => true, 'value' => $financeLeadsValue),
                   
                );
                array_push($prodList, $prod);
            }



            $data = array('prodArray' => $prodList, 'user' => array(), 'product' => $product, 'campaign' => array());
//            dd($data['prodArray']);
//            exit();

//            dd(array_count_values(array_column($data['prodArray'][0]['allLeads'], 'product_id'))['13']);
//            exit();
            return array(
                'success' => true,
                'data' => view('dashboard.elements.inprogress')->with('data', $data)->render(),
            );
        } catch (Exception $ex) {
            LogData::logError('Dashboard Refresh Error', 'Refresh', $ex->getMessage());
            return array(
                'success' => false,
            );
        }
    }

}
