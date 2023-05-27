<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\riController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitHeadController;
use App\Http\Controllers\AllotmentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ApplicationController;

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

  // Landing Page
Route::get('/', function () {
    return view('auth.login');
});

// Registration and login routes
Route::get('/register', [CustomAuthController::class, 'registration'])->name('register-user'); // View registraion blade
Route::post('/custom_registration', [CustomAuthController::class, 'customRegistration'])->name('register-custom');  // Store registration details
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');  //  View Login page
Route::post('/custom_login', [CustomAuthController::class, 'customLogin'])->name('login-custom');   // validate credentials 
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');   // decide user by role
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout'); // Sign out

//  Unit Head
                    // initial setup
Route::get('/initial_setup',[UnitHeadController::class,'initialSetup'])->name('unitHead-initialSetup');  //  Decide first time Unit_Head Login
Route::get('/add_unit_head_profile',[UnitHeadController::class,'createUnitHead'])->name('unitHead-addUnitHead');  // Register UnitHead 
Route::post('/register_unitHead',[UnitHeadController::class,'storeUnitHead'])->name('unitHead-unitRegistration');    //  Store  Unit Head Profile
Route::get('/add_ri', [ UnitHeadController::class, 'createRi'])->name('unitHead-addRi');   // Register Ri 
Route::post('/store_ri',[UnitHeadController::class,'storeRi'])->name('unitHead-storeRi');   //  Store Ri 
Route::get('/unit_head', [ UnitHeadController::class, 'index'])->name('unitHead-home');   // View unit_Head dashboard
                   // profile management
Route::get('/manage_profile',[UnitHeadController::class,'manageProfile'])->name('unitHead-manageProfile');    //  Edit profile & change Credentials of UnitHead and Ri
Route::get('/edit_unitHead',[UnitHeadController::class,'editUnitHeadLoginData'])->name('unitHead-handoverUnitHead');    // Handover UnitHead view
Route::put('/update_unitHead',[UnitHeadController::class,'updateUnitHeadLoginData'])->name('unitHead-updateUnitHead');    //  Update Unit Head credentials
Route::get('/edit_unit_head_profile',[UnitHeadController::class,'editUnitHeadProfile'])->name('unitHead-editProfile');    // Edit Unit Head profile
Route::post('/update_profile',[UnitHeadController::class,'updateUnitHeadProfile'])->name('unitHead-updateProfile');    // Update Unit Head  profile
Route::get('/edit_ri',[UnitHeadController::class,'editRiLoginData'])->name('unitHead-editRi');    // Unit Head edit ri credentials
Route::put('/update_ri',[UnitHeadController::class,'updateRiLoginData'])->name('unitHead-updateRi');    // Update Ri profile by Unit Head
                  // View application requests & Approve
Route::get('/view_application_inbox',[UnitHeadController::class,'viewUnitHeadInbox'])->name('unitHead-applicationRequests');  //  Unit_Head  View application Requests
Route::get('/preview_allotment/{id}', [UnitHeadController::class,'previewAllotment'])->name('unitHead-previewApplication');   //  Unit_Head Preview individual Application  to Approve
                  // Allotment process
Route::get('/approve_application/{id}',[UnitHeadController::class,'approveApplication'])->name('unitHead-approveApplication');  // Unit_Head Approve Application 
Route::get('/ask_willing',[AllotmentController::class,'askWilling'])->name('unitHead-askWilling');    // Unit Head send alert to applicant as notification
Route::get('/view_quarters_details/{id}', [UnitHeadController::class,'previewOnQuartersConfirmation'])->name('unitHead-previewOnQuartersConfirmation');   //  Unit_Head Preview Confirmed Quarters when Eligible applicant found
Route::get('/unit_head_list_pending_confirmations',[UnitHeadController::class,'listPendingConfirmations'])->name('unitHead-listPendingConfirmations');    // Unit head  view all pending confirmations 
Route::get('/view_allottee_details/{allottee}', [UnitHeadController::class,'previewAllottee'])->name('unitHead-previewAllottee');   //  Unit_Head Preview allottee when applicant Confirms Quarters allocated to him\her
                  // Reject application
Route::post('/reject_application/{id}',[UnitHeadController::class,'rejectApplication'])->name('unitHead-rejectApplication');  // Unit_Head Reject Application 
                  // make applicant as occupant 
Route::get('/unit_head_list_confirmed_allottees',[UnitHeadController::class,'listConfirmedAllottees'])->name('unitHead-listConfirmedAllottees');    // Unit head list confirmed allottees for making applicant as occupant 
Route::post('/unit_head_upload_proceedings/{id}',[UnitHeadController::class,'uploadProceedings'])->name('unitHead-uploadProceedings');    // unit head upload proceedings form
Route::get('/unit_head_allot_quarters/{id}',[UnitHeadController::class,'allotQuarters'])->name('unitHead-allotmentComplete');    //  Complete allotment process by uploading proceedings
                  // view all ocuupants
Route::get('/unit_head_view_occupants_details', [UnitHeadController::class,'ViewAllOccupants'])->name('unitHead-viewAllOccupants');   //  Unit_Head view all occupants
                  //  list all vacate requests & process
Route::get('/unit_head_list_vacate_requests',[UnitHeadController::class,'viewAllVacateRequests'])->name('unitHead-listVacateRequests');  //  UnitHead View all vacate Requests
Route::get('/unit_head_preview_vacate/{vacattee}', [UnitHeadController::class,'previewVacatee'])->name('unitHead-previewVacate');   //  UnitHead Preview individual Application  to process vacate request
Route::get('/unit_head_approve_vacate/{vacattee}',[UnitHeadController::class,'approveVacate'])->name('unitHead-approve_vacate');  //   UnitHead Approve vacate request
                  // View seniority list
Route::get('/select_seniorityList', [UnitHeadController::class,'selectSeniorityList'])->name('unitHead-selectSeniorityListType'); //  Unit Head Select Seniority List        
Route::post('/view_seniorityList', [UnitHeadController::class,'viewSeniorityList'])->name('unitHead-view_seniorityLists');  //  Unit Head View Seniority List 
                  // View all quarters list
Route::get('/unit_head_view_all_quarters', [UnitHeadController::class, 'viewAllQuarters'])->name('unitHead-viewAllQuarters');   // Unit_Head list all quarters
Route::get('/unit_head_preview_quarters/{id}', [UnitHeadController::class,'previewQuarter'])->name('unitHead-previewQuarter');   //  Unit_Head Preview particular quarters details and occupants if any

Route::get('/unit_head_register',[UnitHeadController::class,'reports'])->name('unitHead-reports'); // unitHead reports page

// Route::get('/preview_allot_quarters/{id}',[AllotmentController::class,'allotQuartersPreview'])->name('unitHead-allotQuarters');    // Allot Quarters      
// Route::get('/list_vacate_requests',[unitHeadController::class,'viewAllVacateRequests'])->name('UnitHead-vacateRequests');  //  Unit_Head  View application Requests
// Route::get('/preview_vacate/{vacatteeId}', [unitHeadController::class,'previewVacate'])->name('unitHead-previewVacate');   //  Unit_Head Preview individual Application  to Approve


// User
                         // Apply for Quarters
Route::get('/user', [UserController::class,'index'])->name('user-home');    //  User Home
Route::get('/user_application', [ ApplicationController::class, 'createApplication'])->name('user-newApplication');   // User Apply Quarters
Route::post('/store_application',[ApplicationController::class, 'storeApplication'])->name('user-storeApplication');  // Store applicant data
Route::get('/preview_application', [ApplicationController::class,'previewApplication'])->name('user-previewApplication');    //  User application preview
Route::put('/set_reservation/{applicant}',[ApplicationController::class, 'setReservation'])->name('user-reservation');  // User Set reservation
                         // Apply for Quarters - returned Back from preview
Route::get('/edit_my_application/{applicant}', [ ApplicationController::class, 'editMyApplication'])->name('user-editApplication');   // User edit Application When REJECTED BY UNIT_HEAD
Route::put('/update_application/{applicant}',[ApplicationController::class, 'updateMyApplication'])->name('user-updateApplication');  // Update application When REJECTED BY UNIT_HEAD
Route::get('/view_my_application',[UserController::class, 'myApplication'])->name('user-myApplication');  // User view my application
                        // View Quarters - after getting quarters confirmation
Route::get('/view_my_allotment', [UserController::class, 'previewQuarters'])->name('user-myAllotment');  //   User view Quarters - after getting confirmation
                        //  Quarters willingness - confirm
Route::get('/user_view_willingness',[UserController::class,'decideWillingness'])->name('user-willingness'); //    User View quarters willingness . . . . 
Route::get('/confirm_willing/{id}',[UserController::class,'confirmWilling'])->name('user-confirmWilling');    //   User Confirm Willingness       
                        // User in seniority list
Route::get('/view_user_seniorityList',[UserController::class, 'mySeniorityList'])->name('user-mySeniorityList');   //  User view Seniority List 
                        //  Quarters willingness - reject - final
Route::get('/reject_willing_form/{id}',[UserController::class,'decideRejectQuarters'])->name('user-rejectWillingnessForm');    //   form for  reject Willingness User       
Route::post('/final_reject_willing/{id}',[UserController::class,'finalRejectWilling'])->name('user-finalRejectWilling');    //   User priority quarters -  reject Willingness       
Route::post('/first_reject_willing/{id}',[UserController::class,'firstRejectWilling'])->name('user-firstRejectWilling');    //  User non priority allocation reject Willingness       
                        //  View downloads 
Route::get('/user_view_downloads', [UserController::class,'viewDownloads'])->name('user-viewDownloads');; //   user View Downloads
Route::get('/user_download_proceedings',[UserController::class,'downloadProceedings'])->name('user-downloadProceedings');  //  User download Proceedings 
Route::get('/preview_my_allotment',[UserController::class, 'PreviewMyQuarters'])->name('user-myQuarters');  //   User my Quarters Preview
                       // View all quarters
Route::get('/user_select_unit', [UserController::class,'selectUnit'])->name('user-selectUnit'); //   User Select unit for quarters List        
Route::post('/user_view_quarters',[UserController::class,'viewAllQuarters'])->name('user-viewAllQuarters');  //  User View all Quarters
                       // View all unit's seniority list
Route::get('/user_select_seniorityList', [UserController::class,'selectSeniorityList'])->name('user-selectSeniorityListType'); //   Select Seniority List by specifying class and type     
Route::get('/user_view_all_eniorityList', [UserController::class,'viewAllSeniorityList'])->name('user-viewAllSeniorityList'); //   User View all Seniority List 
                  // vacate request
Route::get('/user_vacate_form',[UserController::class,'ViewVacateForm'])->name('user-selfVacate');   //  User Vacate form
Route::post('/user_vacate',[UserController::class,'selfVacate'])->name('user.storeVacateData');   //  Store vacate user data 


Route::get('/user_manage_profile',[UserController::class, 'manageProfile'])->name('user-manageProfile');  // user manage application
// Route::get('/view_my_rejected_application',[UserController::class, 'myRejectedApplication'])->name('user-myRejectedApplication');  // User rejected application
// Route::get('/find_priorittee/{quarters}',[AllotmentController::class,'findPriorittee'])->name('findPriorittee');  // find Priorittee




// RI
Route::get('/ri',[riController::class,'index'])->name('ri-home'); // Ri dashboard page 
                   // Add profile
Route::get('/add_ri_profile',[riController::class,'addRiProfile'])->name('ri-addProfile');    // add ri profile
Route::post('/store_ri_profile',[riController::class,'storeRiProfile'])->name('ri-storeProfile');    // ri store profile
Route::post('/update_ri_profile',[riController::class,'updateRiProfile'])->name('ri-updateProfile');   // ri update profile
                   //  Add Quarters
Route::post('/import_Quarters',[riController::class,'importQuarters'])->name('import-Quarters');     // import Quarters page
Route::get('/add_quarters',[riController::class,'createQuarters'])->name('ri-addQuarters');  // Add Quarters page
Route::post('/store_quarters',[riController::class,'storeQuarters'])->name('ri-storeQuarters');    // Store Quarters
                  //  Add assets
Route::get('/create_assets/{quarters}',[riController::class,'createAssets'])->name('ri-createAssets');  // create Assets 
Route::post('/store_assets',[riController::class,'storeAssets'])->name('ri-storeAssets');  // Store Assets 
                  // Skipp add assets
Route::get('/find_allottee/{id}',[riController::class,'findAllottee'])->name('ri-findAllottee');  // ri-Skipp add assets and find Allottee 
Route::get('/view_all_quarters',[riController::class,'viewAllQuarters'])->name('ri-viewAllQuarters');  // View Quarters
Route::get('/ri_preview_quarters/{id}', [riController::class,'previewQuarter'])->name('ri-previewQuarter');   //  ri Preview particular quarters details and occupants if any
                  // View application requests
Route::get('/ri_view_application_inbox',[riController::class,'viewApplicationInbox'])->name('ri-application_requests');  //  ri all View application Requests
Route::get('/ri_preview_application/{id}', [riController::class,'previewApplication'])->name('ri-previewApplication');   //  ri Preview Application 
                  // Handover key
Route::get('/ri_list_new_allottees',[riController::class,'listNewAllottees'])->name('ri-new_allottees');    // Ri view all new allottees for handover key
Route::get('/ri_view_allottee_details/{allottee}', [riController::class,'previewAllottee'])->name('ri-previewAllottee');   // Ri preview allottee handover key
Route::get('/ri_handover_key/{allottee}', [riController::class,'handoverKey'])->name('ri-handover_key');    // Ri handover key
                  // view all occupants
Route::get('/ri_view_occupants_details', [riController::class,'ViewAllOccupants'])->name('ri-viewAllOccupants');   //  Ri view all occupants
                  // view all vacate requests & process requests
Route::get('/ri_list_vacate_requests',[riController::class,'viewAllVacateRequests'])->name('ri-listVacateRequests');  //  ri  View vacate Requests
Route::get('/ri_preview_vacate/{vacattee}', [riController::class,'previewVacate'])->name('ri-previewVacate');   //  ri preview individual request  to process 
Route::get('/ri_approve_vacate/{occupantId}',[riController::class,'approveVacate'])->name('ri-approveVacate');  // ri approve vacate request 
                  // View seniority list
Route::get('/ri_select_seniorityList', [riController::class,'selectSeniorityList'])->name('ri-selectSeniorityListType'); //  ri Select Seniority List        
Route::post('/ri_view_seniorityList', [riController::class,'viewSeniorityList'])->name('ri-viewSeniorityList'); // ri View Seniority List 
                  // Asset register 
Route::get('/view_assets/{assetRegister}',[riController::class,'viewAssets'])->name('ri-viewAssets');  // ri view assets 
Route::get('/edit_assets/{assetId}',[riController::class,'editAssets'])->name('ri-editAssets');  // edit Asset 
Route::put('/update_assets/{assetRegister}',[riController::class,'updateAssets'])->name('ri-updateAssets');  // update Asset 
Route::get('/delete_assets/{assetRegister}',[riController::class,'deleteAssets'])->name('ri-deleteAssets');  // delete Asset 
Route::post('/store_new_assets',[riController::class,'storeNewAssets'])->name('ri-storeNewAssets');  // add Asset 



// Route::get('/hold_quarters/{id}',[riController::class,'holdQuarters'])->name('ri-holdQuarters');  //  Hold quarters  
// Route::get('/ri_view_allottee/{id}', [riController::class,'previewAllottee'])->name('ri-previewAllottee');   //  Unit_Head Preview allottee
// Route::get('/ri_preview_quarter/{id}', [riController::class,'previewAllotment'])->name('ri-previewApplication');   //  ri Preview paricular quarters details and occupants if any
// Route::get('/find_priorittee/{id}',[AllotmentController::class,'findPriorittee'])->name('ri-findPriorittee');  // ri-findPriorittee
// Route::get('/ri_preview_allotment/{id}', [UnitHeadController::class,'previewAllotment'])->name('unitHead-previewApplication');   //  Unit_Head Preview individual Application  to Approve
// Route::post('/ri_reject_application/{id}',[riController::class,'rejectApplication'])->name('ri-reject_application');  // ri Reject Application 






