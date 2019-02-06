<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/users', function () {
    return view('users');
});

Route::post('/assignAgent','lead\UnassignedLeadsController@assignAgent');

// Get data from controllers
Route::get('/user/getbranches','UserController@getBranches');
Route::get('/user/getroles','UserController@getRoles');
Route::get('/allLeads','lead\AllLeadsController@index');
Route::get('/incomminglead', function () {
    return view('lead.back');
});
// Post data from forms

Route::post('/user/create' , 'user\UserController@create');
Route::post('/user/update' , 'user\UserController@update');
Route::post('/user/activate' , 'user\UserController@activate');
Route::post('/branch/create' , 'user\BranchController@create');
Route::post('/branch/update' , 'user\BranchController@update');
Route::post('/branch/cities' , 'user\BranchController@cities');
Route::post('/product/create' , 'campaign\ProductController@create');
Route::post('/city/create' , 'user\BranchController@addCity');
Route::post('/product/update' , 'campaign\ProductController@update');
Route::post('/campaign/create' , 'campaign\CampaignController@create');
Route::post('/campaign/edit' , 'campaign\CampaignController@update');
Route::post('/lead/create' , 'lead\LeadController@create');
Route::post('/lines/create' , 'line\LineController@create');
Route::post('/lines/setagent' , 'line\LineController@setAgent');
Route::get('/lead/updateseen' , 'lead\LeadController@updateSeen');
Route::post('/lead/bulkCreate' , 'lead\LeadController@bulkCreate');
Route::post('/lead/setBranch' , 'lead\LeadSetBranchController@setbranch');
Route::post('/lead/followup' , 'lead\LeadNewController@followUp');
Route::get('/lead/getIncommingLead' , 'lead\LeadController@getIncammingLeqdDetail');
Route::post('/report/generate' , 'report\ReportController@generate');

Route::post('/dashboard/refresh' , 'dashboard\DashboardController@refresh');
Route::post('/dashboardinprg/refresh' , 'dashboard\DashboardInProgressController@refresh');
Route::post('/dashboardtopagents/refresh' , 'dashboard\DashboardTopUserController@refresh');
Route::post('/lead/refresh' , 'lead\LeadController@refresh');
Route::post('/campaign/refresh' , 'campaign\CampaignController@refresh');
Route::post('/product/refresh' , 'campaign\ProductController@refresh');
Route::post('/branch/refresh' , 'user\BranchController@refresh');
Route::post('/user/refresh' , 'user\UserController@refresh');
Route::post('/eventlog/refresh' , 'eventlog\EventController@refresh');
Route::post('/lines/refresh' , 'line\LineController@refresh');
Route::post('/lead/submitcomplain','lead\LeadController@submitcomment');
// Load resources
Route::resources(['/unassignedLeads' => 'lead\UnassignedLeadsController']);
Route::resources(['/manageUsers' => 'user\UserController']);
Route::resources(['/manageBranches' => 'user\BranchController']);
Route::resources(['/manageProduct' => 'campaign\ProductController']);
Route::resources(['/manageCampaign' => 'campaign\CampaignController']);
Route::resources(['/leadsAdd' => 'lead\LeadController']);
Route::resources(['/leadsOrphaned' => 'lead\LeadOrphController']); 
Route::resources(['/leadsNew' => 'lead\LeadNewController']);
Route::resources(['/unassignedLeads' => 'lead\UnassignedLeadsController']);
Route::resources(['/leadsInprogress' => 'lead\LeadProcessController']); 
Route::resources(['/leadsPositive' => 'lead\LeadPositiveController']); 
Route::resources(['/leadsProcessed' => 'lead\LeadCompletedController']); 
Route::resources(['/leadsNegative' => 'lead\LeadNegativeController']); 
Route::resources(['/reportGenerate' => 'report\ReportController']);

Route::resources(['/eventLog' => 'eventlog\EventController']); 
Route::resources(['/lines' => 'line\LineController']); 

Route::resources(['/dashboard' => 'dashboard\DashboardController']); 
Route::resources(['/dashboardinprg' => 'dashboard\DashboardInProgressController']); 
Route::resources(['/dashboardtopagents' => 'dashboard\DashboardTopUserController']); 

Route::get('/changePassword','user\UserController@changePasswordForm');
Route::post('/changePassword','user\UserController@changePassword')->name('changePassword');



// Excel  TO BE DISCARDED
Route::get('export-file/{type}', 'ExcelController@exportFile')->name('export.file');

Auth::routes();

// Deafult route
//Route::get('/home', 'HomeController@index')->name('home');
