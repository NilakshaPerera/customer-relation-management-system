<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Libraries\LogData;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');


    }

    public function index() {
        if(config('constants.roles.callagent') ==  Auth::user()->role_id){
            return redirect('/leadsAdd');
        }

        return view('dashboard.dashboard');
    }

    public function refresh(Request $request) {

        $products = Product::where('active', 1)->get();
        $prodList = array();
        try {

            foreach ($products as $product) {

                $totalLeadStalValue = 100;
                $positiveLEadsValue = 100;
                $negativeLeadsValue = 100;
                $pendingLeadsValue = 100;
                $convertedLeadsValue = 100;
                $revenueLeadsValue = 100;

                // Total Leads 
                $before7Days = count($product->generallead->where('created_at', '<', date('Y-m-d H:i:s', strtotime('-7 days'))));
                $within7Days = count($product->generallead->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-7 days'))));

                if ($before7Days > 0 && $within7Days > 0) {
                    $totalLeadStalValue = ($within7Days * 100) / $before7Days;
                } else if (!$within7Days) {
                    $totalLeadStalValue = 0;
                }

                // Total Positives
                $positiveBefore7Days = count($product->generallead->where('updated_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 6));
                $positiveWithin7Days = count($product->generallead->where('updated_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 6));

                if ($positiveBefore7Days > 0 && $positiveWithin7Days > 0) {
                    $positiveLEadsValue = ($positiveWithin7Days * 100) / $positiveBefore7Days;
                } else if (!$positiveWithin7Days) {
                    $positiveLEadsValue = 0;
                }

                // Total Negatives
                $negativeBefore7Days = count($product->generallead->where('updated_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 2));
                $negativeWithin7Days = count($product->generallead->where('updated_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 2));

                if ($negativeBefore7Days > 0 && $negativeWithin7Days > 0) {
                    $negativeLeadsValue = ($negativeWithin7Days * 100) / $negativeBefore7Days;
                } else if (!$negativeWithin7Days) {
                    $negativeLeadsValue = 0;
                }

                // Total Pendings 
                $pendingBefore7Days = count($product->generallead->where('updated_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 3));
                $pendingWithin7Days = count($product->generallead->where('updated_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 3));

                if ($pendingBefore7Days > 0 && $pendingWithin7Days > 0) {
                    $pendingLeadsValue = ($pendingWithin7Days * 100) / $pendingBefore7Days;
                } else if (!$pendingWithin7Days) {
                    $pendingLeadsValue = 0;
                }

                // Total Converted
                $convertedBefore7Days = count($product->generallead->where('updated_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 1));
                $convertedWithin7Days = count($product->generallead->where('updated_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->where('conversionstatus_id', 1));

                if ($convertedBefore7Days > 0 && $convertedWithin7Days > 0) {
                    $convertedLeadsValue = ($convertedWithin7Days * 100) / $convertedBefore7Days;
                } else if (!$convertedWithin7Days) {
                    $convertedLeadsValue = 0;
                }

                // Total Revenue 
                $revenueBefore7Days = $product->generallead->where('updated_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))->sum('revenue');
                $revenueWithin7Days = $product->generallead->where('updated_at', '>', date('Y-m-d H:i:s', strtotime('-7 days')))->sum('revenue');

                if ($revenueBefore7Days > 0 && $revenueWithin7Days > 0) {
                    $revenueLeadsValue = ($revenueWithin7Days * 100) / $revenueBefore7Days;
                } else if (!$revenueWithin7Days) {
                    $revenueLeadsValue = 0;
                }

                $prod = array(
                    'prodname' => $product->name,
                    'totalleads' => count($product->generallead),
                    'totalleadsstat' => array('raise' => true, 'value' => $totalLeadStalValue),
                    'positive' => count($product->generallead->where('conversionstatus_id', 6)),
                    'positivestat' => array('raise' => true, 'value' => $positiveLEadsValue),
                    'negative' => count($product->generallead->where('conversionstatus_id', 2)),
                    'negativestat' => array('raise' => true, 'value' => $negativeLeadsValue),
                    'pending' => count($product->generallead->where('conversionstatus_id', 3)),
                    'pendingstat' => array('raise' => true, 'value' => $pendingLeadsValue),
                    'converted' => count($product->generallead->where('conversionstatus_id', 1)),
                    'convertedstat' => array('raise' => true, 'value' => $convertedLeadsValue),
                    'revenue' => $product->generallead->sum('revenue'),
                    'revenuestat' => array('raise' => true, 'value' => $pendingLeadsValue),
                );
                array_push($prodList, $prod);
            }

            $data = array('prodArray' => $prodList, 'user' => array(), 'product' => $product, 'campaign' => array());
            return array(
                'success' => true,
                'data' => view('dashboard.elements.elements')->with('data', $data)->render(),
            );
        } catch (Exception $ex) {
            LogData::logError('Dashboard Refresh Error', 'Refresh', $ex->getMessage());
            return array(
                'success' => false,
            );
        }
    }

}
