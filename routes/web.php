<?php

use App\Models\District;
use App\Models\Quarters;
use Illuminate\Http\Request;
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
Route::get('register', [CustomAuthController::class, 'registration'])->name('register-user'); //To view registraion blade
Route::post('custom_registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); //To Submit registration details
Route::get('login', [CustomAuthController::class, 'index'])->name('login'); //To View Login Page
Route::post('custom_login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); //To fetch login details
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout'); //Sign out
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');


    //        User
Route::get('/user', [UserController::class,'index']);    // View User Dashboard
Route::get('/user_application', [ ApplicationController::class, 'newApplication'])->name('user-newApplication');   // User View Apply Quarters
Route::post('/store_application',[ApplicationController::class, 'store'])->name('user.store');  // Store applicant data
Route::get('/manage_application',[UserController::class, 'manageProfile'])->name('user-myApplication');  // user manage application
Route::get('/edit_application',[UserController::class, 'edit'])->name('user.edit_application');  // Edit Profile
Route::get('/view_userSeniorityList',[UserController::class, 'viewSeniorityList'])->name('user-seniorityList');   //  User view Seniority List 
Route::get('/user_view_willingness',[AllotmentController::class,'viewNotifications'])->name('user.notifications');   //  User View quarters willing Notifications . . . . 
Route::get('/confirm_willing/{id}',[AllotmentController::class,'confirmWilling'])->name('unitHead-confirmWilling');    // User Confirm Willingness       
Route::get('/user_vacate_form',[UserController::class,'ViewVacateForm'])->name('user.self-vacate');   //  User Vacate form
Route::post('/user_vacate',[UserController::class,'selfVacate'])->name('user.store_vacate_data');   //  Store vacate user data 
   

//       Unit Head
Route::get('/unit_head', [ UnitHeadController::class, 'index']);   // View unit Head dashboard
Route::get('/view_application_inbox',[unitHeadController::class,'viewUnitHeadInbox'])->name('unitHead-application_requests');  // View Unit Head application Requests
Route::get('/add_unitHead_profile',[unitHeadController::class,'addUnitHead'])->name('unitHead-add_unitHead');  //  Edit Unit Head Data
Route::get('/manage_profile',[unitHeadController::class,'manageProfile'])->name('unitHead-manage_profile');  //  Edit Unit Head Data

Route::get('/view_application/{id}', [unitHeadController::class,'previewApplication'])->name('unitHead-viewApplication');   //  Preview individual Application  to Approve
Route::get('/approve_application/{id}',[UnitHeadController::class,'approveApplication'])->name('unitHead-approve_application');  // Approve Application data :  Query string
Route::get('/view_seniorityList', [UnitHeadController::class,'viewSeniorityList']); //  Unit Head View Seniority List 
Route::get('/select_seniorityList', [UnitHeadController::class,'selectSeniorityList'])->name('unitHead-selectSeniorityListType'); //  Unit Head Select Seniority List        
Route::get('/manage_quarters',[UnitHeadController::class,'viewQuarters'])->name('unitHead-viewQuarters');    // Unit Head manage Quarters
Route::post('/register_unit',[UnitHeadController::class,'registerUnit'])->name('unitHead-unit_registration');    //  Register Unit by UnitHead
Route::get('/unit_head_quarters_status', [ UnitHeadController::class, 'quartersStatus'])->name('unitHead-quarters_status');   // View unit Head dashboard
Route::get('/add_ri', [ UnitHeadController::class, 'addRi'])->name('unitHead-addRi');   // Add Ri
Route::post('/store_ri',[UnitHeadController::class,'storeRi'])->name('unitHead-storeRi');   //  Register Unit by UnitHead
Route::get('/ask_willing',[AllotmentController::class,'askWilling'])->name('unitHead-askWilling');    // Unit Head ask willingness of applicants before allotting quarters
Route::get('/preview_allot_quarters/{id}',[AllotmentController::class,'allotQuartersPreview'])->name('unitHead-allotQuarters');    // Allot Quarters      
Route::get('/unitHead_list_confirmed_allottees',[AllotmentController::class,'listConfirmedAllottees'])->name('unitHead.list_confirmed_allottees');    // User Allot Quarters      
Route::get('/unitHead_allot_quarters/{id}',[AllotmentController::class,'allotQuarters'])->name('unitHead.allotment_complete');    // User Allot Quarters      


// RI
Route::get('/ri',[riController::class,'index']);   // Ri dashboard page 
Route::get('/add_quarters',[riController::class,'addQuarters'])->name('ri-addQuarters');  // Add Quarters page
Route::post('/quarters',[riController::class,'store'])->name('newQuarters');    // submit new Quarters form
Route::get('/view_quarters',[riController::class,'viewQuarters'])->name('ri-viewQuarters');  // View Quarters



Route::get('/view',[UnitHeadController::class, 'viewAllottees']);



