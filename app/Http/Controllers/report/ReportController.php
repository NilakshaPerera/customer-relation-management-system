<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Campaign;
use App\Product;
use App\User;
use App\Branch;
use Validator;
use App\Generallead;
use Libraries\LogData;

class ReportController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $campaign = Campaign::all();
        $product = Product::all();
        $user = User::where('role_id', 4)->get();
        $branch = Branch::all();
        $data = array('user' => $user, 'product' => $product, 'campaign' => $campaign, 'branch' => $branch);
        return view('report.report_generate')->with('data', $data);
    }

    public function generate(Request $data) {

        // return view('report\templates\revenueproduct')->with('data', "some passed dara")->render();

        $repType = $data['selreport'];
        try {
            LogData::log('Generate report selector', 'generate', 'Start');
            if ($repType > 0) {
                switch ($repType) {
                    case 1: // Revenue by Products  1
                        return self::productRevenue($data);
                        break;
                    case 2: // Revenue by Campaigns 2
                        return self::campaignRevenue($data);
                        break;
                    case 3: // Progress By Employee 3 
                        return self::employeeRevenue($data);
                        break;
                    default:
                        return array(
                            'success' => false,
                            'errors' => 'Invalid report type.',
                        );
                }
            } else {
                return array(
                    'success' => false,
                    'errors' => 'You must select a report type.',
                );
            }
        } catch (Exception $ex) {
            LogData::logError('Generate report selector error', 'generate', $ex->getMessage());
            return array(
                'success' => false,
                'errors' => 'Error occured while trying to select report.',
            );
        }
    }

    public function productRevenue($data) {

        try {
            LogData::log('Generate Product revenue report', 'productRevenue', 'Start');
            $prodOperator = '!=';
            $prodValue = '';
            $period = 'All';
            if ($data['selprod'] <> 0) {
                $prodOperator = '=';
                $prodValue = $data['selprod'];
            }

            $leads = array();

            if ($data['checkall']) {

                $leads = Product::where('id', $prodOperator, $prodValue)
                        ->has('generallead')
                        ->get();
            } else {

                $datesArr = self::splitDates($data['reservation']);
                $period = implode(' - ', $datesArr);
                $leads = Product::where('id', $prodOperator, $prodValue)
                        ->whereHas('generallead', function($query) use ($datesArr) {
                            $query->whereBetween('generalleads.updated_at', [$datesArr[0], $datesArr[1]]);
                        })
                        ->get();
            }

            $data = array('products' => $leads, 'period' => $period);
            return view('report.templates.revenueproduct')->with('data', $data)->render();
        } catch (Exception $ex) {
            LogData::logError('Generate Product revenue report Error', 'productRevenue', $ex->getMessage());
            return view('errors.ex');
        }
    }

    public function campaignRevenue($data) {
        try {
            LogData::log('Generate Campaign revenue report', 'campaignRevenue', 'Start');
            $campOperator = '!=';
            $campValue = '';
            if ($data['selcamp'] <> 0) {
                $campOperator = '=';
                $campValue = $data['selcamp'];
            }

            $leads = array();

            if ($data['checkall']) {

                $leads = Campaign::where('id', $campOperator, $campValue)
                        ->has('generallead')
                        ->get();
            } else {
                // $before7Days = $product->generallead->where('created_at', '<', date('Y-m-d H:i:s', strtotime('-7 days')))
                $datesArr = self::splitDates($data['reservation']);

                $leads = Campaign::where('id', $campOperator, $campValue)
                        ->whereHas('generallead', function($query) use ($datesArr) {
                            $query->whereBetween('generalleads.updated_at', [$datesArr[0], $datesArr[1]]);
                        })
                        ->get();
            }

            $data = array('camps' => $leads);
            return view('report.templates.revenuecampaign')->with('data', $data)->render();
        } catch (Exception $ex) {
            LogData::logError('Generate Campaign revenue report Error', 'campaignRevenue', $ex->getMessage());
            return view('errors.ex');
        }
    }

    public function employeeRevenue($data) {

        try {
            LogData::log('Generate Employee revenue report', 'campaignRevenue', 'Start');
            $brOperator = '<>';
            $brValue = '';
            if ($data['selbranch'] != 0) {
                $brOperator = '=';
                $brValue = $data['selbranch'];
            }

            $leads = array();
            $users = User::where('branch_id', $brOperator, $brValue)
                    ->where('role_id', '=', 4)
                    ->get();
            
            $datesArr = self::splitDates($data['reservation']);

            foreach ($users as $user) {

                $leaddata = array(
                    'name' => $user->name,
                    'empid' => $user->empid,
                    'branch' => $user->branch->name,
                );

                if ($data['checkall']) {
                    $leaddata['totalleads'] = count(Generallead::where('agent_id', $user->id)->get());
                    $leaddata['positiveleads'] = count(Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 6)->get());
                    $leaddata['inprogressleads'] = count(Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 3)->get());
                    $leaddata['negativeleads'] = count(Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 2)->get());
                    $leaddata['converted'] = count(Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 1)->get());
                    $leaddata['revenue'] = Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 1)->sum('revenue');
                } else {
 
                    $leaddata['totalleads'] = count(Generallead::where('agent_id', $user->id)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->get());
                    $leaddata['positiveleads'] = count(Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 6)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->get());
                    $leaddata['inprogressleads'] = count(Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 3)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->get());
                    $leaddata['negativeleads'] = count(Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 2)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->get());
                    $leaddata['converted'] = count(Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 1)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->get());
                    $leaddata['revenue'] = Generallead::where('agent_id', $user->id)->where('conversionstatus_id', 1)->whereBetween('created_at', [$datesArr[0], $datesArr[1]])->whereBetween('updated_at', [$datesArr[0], $datesArr[1]])->sum('revenue');
                }

                array_push($leads, $leaddata);
            }
            // whereBetween('created_at', [$datesArr[0], $datesArr[1]])
            //  whereBetween('generalleads.updated_at', [$datesArr[0], $datesArr[1]])
// ->where('period_starts_at','<=', $datesArr[0])->where('period_ends_at','>=', $datesArr[1])
//            if ($data['checkall']) {
//                
//            } else {
//
//                $datesArr = self::splitDates($data['reservation']);
//                $users = User::where('branch_id', $brOperator, $brValue)
//                        ->where('role_id', '=', 5)
//                        ->whereHas('generallead', function($query) use ($datesArr) {
//                            $query->whereBetween('generalleads.updated_at', [$datesArr[0], $datesArr[1]]);
//                        })
//                        ->get();
//            }

            $data = array('users' => $leads);
            return view('report.templates.progressemployee')->with('data', $data)->render();
        } catch (Exception $ex) {
            LogData::logError('Generate Employee revenue report Error', 'campaignRevenue', $ex->getMessage());
            return view('errors.ex');
        }
    }

    // Splits a date time string as this : 02/06/2018 - 02/15/2018
    public function splitDates($dateString, $format = 'Y-m-d H:i:s') {
        $dates = explode('-', $dateString);
        try {
            LogData::log('Split start and end dates', 'splitDates', 'Start');
            if ($format) {
                $formattedDate = array();
                foreach ($dates as $date) {
                    $tempDate = date_create($date);
                    $date = date_format($tempDate, $format);
                    array_push($formattedDate, $date);
                }
                return $formattedDate;
            }

            return $dates;
        } catch (Exception $ex) {
            LogData::logError('Split start and end dates Error', 'setbranch', $ex->getMessage());
            return array(
                'success' => false,
                'error' => $ex->getMessage(),
            );
        }
    }

}
