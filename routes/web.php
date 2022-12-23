<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanOfficer\LoanOfficerController;
use Illuminate\Support\Facades\Auth;

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



Route::get('/', function()
{
return redirect('login');	
});
Route::get('all_notice', [App\Http\Controllers\AllNoticeController::class, 'all_notice']);
Route::get('contact-us', [App\Http\Controllers\ContactController::class, 'contact']);
Route::get('about-us', [App\Http\Controllers\AboutusController::class, 'about_us']);
Route::get('disclaimer', [App\Http\Controllers\DisclaimerController::class, 'disclaimer']);
Route::get('privacy-policy', [App\Http\Controllers\PrivacyController::class, 'privacy_policy']);


/*--===============Menu Route==============--*/
Route::get('/admin/dashboard/about-us', [App\Http\Controllers\menu\AboutusController::class, 'aboutUs']);

Route::post('/admin/dashboard/about-us', [App\Http\Controllers\menu\AboutusController::class, 'aboutUs_content']);

Route::get('/admin/dashboard/disclaimer', [App\Http\Controllers\menu\DisclaimerController::class, 'disclaimerPage']);

Route::post('/admin/dashboard/disclaimer', [App\Http\Controllers\menu\DisclaimerController::class, 'disclaimer_content']);

Route::get('/admin/dashboard/privacy-policy', [App\Http\Controllers\menu\PrivacyController::class, 'privacyPolicy']);

Route::post('/admin/dashboard/privacy-policy', [App\Http\Controllers\menu\PrivacyController::class, 'privacy_content']);



// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Auth::routes();
/*----------------------For Zilla and upazilla get using ajax code---------------------------------*/
Route::post('/getUpazila', [App\Http\Controllers\Officer\OfficerController::class, 'getUpazila']);
Route::post('/getUnions', [App\Http\Controllers\Officer\OfficerController::class, 'getUnions']);
Route::post('/getgranterUpazila', [App\Http\Controllers\Officer\OfficerController::class, 'getgranter_Upazila']);
Route::post('/getgranterUnions', [App\Http\Controllers\Officer\OfficerController::class, 'getgranter_Unions']);

Route::post('/getgranterTwoUpazila', [App\Http\Controllers\Officer\OfficerController::class, 'getgranter_2_Upazila']);

Route::post('/getgranterTwoUnions', [App\Http\Controllers\Officer\OfficerController::class, 'getgranter_2_Unions']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


/*--------------Admin Panel Route---------------------*/
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboardView'])->middleware('is_admin');

Route::get('/admin/change-password', [App\Http\Controllers\Admin\DashboardController::class, 'changePassword_Page'])->middleware('is_admin');

Route::post('/admin/change-password', [App\Http\Controllers\Admin\DashboardController::class, 'changePassword_update'])->middleware('is_admin');

Route::get('/admin/site-settings', [App\Http\Controllers\Admin\SettingsController::class, 'settings_Page'])->middleware('is_admin');

Route::post('/admin/site-settings', [App\Http\Controllers\Admin\SettingsController::class, 'settings_Update'])->middleware('is_admin');
Route::get('/admin/all-notice', [App\Http\Controllers\Admin\NoticeController::class, 'all_notice'])->middleware('is_admin');

Route::get('/admin/loginfo/{id}', [App\Http\Controllers\UserLogController::class, 'index'])->middleware('is_admin');


/*-------------------------Admin List---------------------------------*/
Route::get('/admin/list-admin', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Page'])->middleware('is_admin');

Route::post('/admin/list-admin', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Post']);

Route::get('/admin/list-admin/{id}/edit', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Edit'])->middleware('is_admin');

Route::post('/admin/list-admin/{id}/edit', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Update'])->middleware('is_admin');

Route::get('/admin/list-admin/{id}/delete', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Delete'])->middleware('is_admin');

/*-----------------Create Notice------------------------------*/
Route::get('/create-notice', [App\Http\Controllers\Admin\NoticeController::class, 'notice_page']);
Route::post('/create-notice', [App\Http\Controllers\Admin\NoticeController::class, 'notice_create']);
Route::get('/notice-edit/{id}', [App\Http\Controllers\Admin\NoticeController::class, 'notice_Edit']);
Route::post('/notice-edit/{id}', [App\Http\Controllers\Admin\NoticeController::class, 'notice_Update']);
Route::get('/notice-delete/{id}', [App\Http\Controllers\Admin\NoticeController::class, 'notice_Delete']);
Route::get('/admin/dashboard/all-member-list', [App\Http\Controllers\Admin\MemberController::class, 'allMemberList']);

Route::get('/admin/dashboard/member-edit/list', [App\Http\Controllers\Admin\MemberController::class, 'allEditRequestMember']);

Route::get('/admin/dashboard/member-edit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditByAdmin']);

Route::get('/admin/dashboard/memberedit/request/view/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditRequestView']);

Route::post('/admin/dashboard/memberedit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditByAdminPost']);

Route::get('/admin/dashboard/memberedit/request/aprove/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditRequestAprove']);

Route::get('/admin/dashboard/memberedit/request/reject/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditRequestRejected']);

Route::get('/admin/dashboard/view-member-profile/{id}', [App\Http\Controllers\Admin\MemberController::class, 'MemberView']);

Route::get('/admin/dashboard/member-delete/{id}', [App\Http\Controllers\Admin\MemberController::class, 'MemberDelete']);

Route::get('/admin/dashboard/member-loan-approve/{id}', [App\Http\Controllers\Admin\MemberController::class, 'MemberLoanApprove']);


Route::get('/admin/dashboard/member-loan-rejected/{id}', [App\Http\Controllers\Admin\MemberController::class, 'MemberLoanRejected']);





/*--===============Profile List Route===============--*/
Route::get('/admin/dashboard/all-manager-profile', [App\Http\Controllers\Admin\ManagerProfileController::class, 'allManager']);

Route::get('/admin/dashboard/all-loan-officer-profile', [App\Http\Controllers\Admin\OfficerProfileController::class, 'allOfficer']);

Route::get('/admin/dashboard/all-rejected-profile', 'RejectedProfileController@rejectedProfile');

/*-------------------Admin Panel Route End Here----------------------*/










/*--------------------Loan Manager Route Start ----------------------------*/
Route::get('/home/create-loan-officer', [App\Http\Controllers\Manager\ManagerController::class, 'create']);

Route::post('/home/create-loan-officer', [App\Http\Controllers\Manager\ManagerController::class, 'create_loan_officer']);

Route::get('/home/create-loan-officer/edit/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loan_officer_edit']);

Route::post('/home/create-loan-officer/edit/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loan_officer_update']);

Route::get('/home/loan-member-list', [App\Http\Controllers\Manager\ManagerController::class, 'loanMemberList']);

Route::get('/home/member-profile-view/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'memberProfileView']);

Route::get('/home/loan-approve/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loanApprove']);

Route::post('/home/loan-rejected/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loanRejected']);

Route::get('/home/loan-member/edit/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loanmember_Edit']);

Route::post('/home/loan-member/edit/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loanmember_UpdateRequest']);

Route::get('/home/manager/profile-settings', [App\Http\Controllers\Manager\ProfileSettingsController::class, 'profile_form']);

Route::post('/home/manager/profile-settings', [App\Http\Controllers\Manager\ProfileSettingsController::class, 'profile_change']);

Route::get('/home/manager/print-single-user/{id}', [App\Http\Controllers\Manager\PrintController::class, 'singleUser_print']);
/*--------------------Loan Manager Route End ----------------------------*/

Route::get('/home/notice/{id}', [App\Http\Controllers\HomeController::class, 'NotificationView']);


/*---------------------Loan Officer Admin Panel Route----------------------------------*/

Route::get('/home/create-user-profile', [App\Http\Controllers\Officer\OfficerController::class, 'userProfile_form']);

Route::post('/home/create-user-profile', [App\Http\Controllers\Officer\OfficerController::class, 'userProfile_post']);

Route::get('/home/loan-officer-member-list', [App\Http\Controllers\Officer\MemberController::class, 'LoanOfficerMemberList']);

Route::get('/home/loan-officer/view-member-profile/{id}', [App\Http\Controllers\Officer\MemberController::class, 'OfficerMemberView']);

Route::get('/home/loan-officerdashboard/loan-submit', [App\Http\Controllers\Officer\SmsController::class, 'LoanSubmit']);

// Bad Ace
Route::get('/home/loan/officer/send-sms/{id}', [App\Http\Controllers\Officer\SmsController::class, 'sendSms']);
// Bad Ace

Route::get('/home/loan-officer/profile-settings', [App\Http\Controllers\Officer\ProfileSettingsController::class, 'profile_form']);

Route::post('/home/loan-officer/profile-settings', [App\Http\Controllers\Officer\ProfileSettingsController::class, 'profile_change']);

Route::post('/getForminfo', [App\Http\Controllers\Officer\LoanEntryController::class, 'getForminfo']);
Route::post('/home/loan-officer/loan-entry/', [App\Http\Controllers\Officer\LoanEntryController::class, 'loanEntry']);

Route::get('/home/loan-officer/loan-recive', [App\Http\Controllers\LoanReciveController::class, 'loanEntry']);

/*---------------------Loan Officer Admin Panel Route End Here----------------------------------*/
