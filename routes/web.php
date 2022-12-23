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



Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');
Route::get('all_notice', [App\Http\Controllers\AllNoticeController::class, 'all_notice'])->name('allNotice');
Route::get('contact-us', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact.us');
Route::get('about-us', [App\Http\Controllers\AboutusController::class, 'about_us'])->name('about.us');
Route::get('disclaimer', [App\Http\Controllers\DisclaimerController::class, 'disclaimer'])->name('disclaimer.page');
Route::get('privacy-policy', [App\Http\Controllers\PrivacyController::class, 'privacy_policy'])->name('privacy.page');


/*--===============Menu Route==============--*/
Route::get('/admin/dashboard/about-us', [App\Http\Controllers\menu\AboutusController::class, 'aboutUs'])->name('aboutUs');
Route::post('/admin/dashboard/about-us', [App\Http\Controllers\menu\AboutusController::class, 'aboutUs_content'])->name('aboutUs');

Route::get('/admin/dashboard/disclaimer', [App\Http\Controllers\menu\DisclaimerController::class, 'disclaimerPage'])->name('disclaimer.admin.page');
Route::post('/admin/dashboard/disclaimer', [App\Http\Controllers\menu\DisclaimerController::class, 'disclaimer_content'])->name('disclaimer.admin.page');

Route::get('/admin/dashboard/privacy-policy', [App\Http\Controllers\menu\PrivacyController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::post('/admin/dashboard/privacy-policy', [App\Http\Controllers\menu\PrivacyController::class, 'privacy_content'])->name('privacyPolicy');



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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*--------------Admin Panel Route---------------------*/
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboardView'])->name('admin.dashboard')->middleware('is_admin');
Route::get('/admin/change-password', [App\Http\Controllers\Admin\DashboardController::class, 'changePassword_Page'])->name('change.password')->middleware('is_admin');
Route::post('/admin/change-password', [App\Http\Controllers\Admin\DashboardController::class, 'changePassword_update'])->name('change.password')->middleware('is_admin');
Route::get('/admin/site-settings', [App\Http\Controllers\Admin\SettingsController::class, 'settings_Page'])->name('site.settings')->middleware('is_admin');
Route::post('/admin/site-settings', [App\Http\Controllers\Admin\SettingsController::class, 'settings_Update'])->name('site.settings')->middleware('is_admin');
Route::get('/admin/all-notice', [App\Http\Controllers\Admin\NoticeController::class, 'all_notice'])->name('all.notice')->middleware('is_admin');
Route::get('/admin/loginfo/{id}', [App\Http\Controllers\UserLogController::class, 'index'])->name('user.loginfo')->middleware('is_admin');


/*-------------------------Admin List---------------------------------*/
Route::get('/admin/list-admin', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Page'])->name('list.admin')->middleware('is_admin');
Route::post('/admin/list-admin', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Post'])->name('list.admin');
Route::get('/admin/list-admin/{id}/edit', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Edit'])->name('list.admin.edit')->middleware('is_admin');
Route::post('/admin/list-admin/{id}/edit', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Update'])->name('list.admin.edit')->middleware('is_admin');
Route::get('/admin/list-admin/{id}/delete', [App\Http\Controllers\Admin\ListAdminController::class, 'listadmin_Delete'])->name('list.admin.delete')->middleware('is_admin');

/*-----------------Create Notice------------------------------*/
Route::get('/create-notice', [App\Http\Controllers\Admin\NoticeController::class, 'notice_page'])->name('notice.create');
Route::post('/create-notice', [App\Http\Controllers\Admin\NoticeController::class, 'notice_create'])->name('notice.create');
Route::get('/notice-edit/{id}', [App\Http\Controllers\Admin\NoticeController::class, 'notice_Edit'])->name('notice.edit');
Route::post('/notice-edit/{id}', [App\Http\Controllers\Admin\NoticeController::class, 'notice_Update'])->name('notice.edit');
Route::get('/notice-delete/{id}', [App\Http\Controllers\Admin\NoticeController::class, 'notice_Delete'])->name('notice.delete');
Route::get('/admin/dashboard/all-member-list', [App\Http\Controllers\Admin\MemberController::class, 'allMemberList'])->name('all.member.list');
Route::get('/admin/dashboard/member-edit/list', [App\Http\Controllers\Admin\MemberController::class, 'allEditRequestMember'])->name('all.edit.request.member');
Route::get('/admin/dashboard/member-edit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditByAdmin'])->name('member.edit.byadmin');

Route::get('/admin/dashboard/memberedit/request/view/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditRequestView'])->name('member.edit.request.view');
Route::post('/admin/dashboard/memberedit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditByAdminPost'])->name('member.edit.by.admin');
Route::get('/admin/dashboard/memberedit/request/aprove/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditRequestAprove'])->name('member.edit.request.aprove');
Route::get('/admin/dashboard/memberedit/request/reject/{id}', [App\Http\Controllers\Admin\MemberController::class, 'loanmember_EditRequestRejected'])->name('member.edit.request.reject');
Route::get('/admin/dashboard/view-member-profile/{id}', [App\Http\Controllers\Admin\MemberController::class, 'MemberView'])->name('member.view.profile');
Route::get('/admin/dashboard/member-delete/{id}', [App\Http\Controllers\Admin\MemberController::class, 'MemberDelete'])->name('member.delete');
Route::get('/admin/dashboard/member-loan-approve/{id}', [App\Http\Controllers\Admin\MemberController::class, 'MemberLoanApprove'])->name('member.loan.approve');
Route::get('/admin/dashboard/member-loan-rejected/{id}', [App\Http\Controllers\Admin\MemberController::class, 'MemberLoanRejected'])->name('member.loan.rejected');





/*--===============Profile List Route===============--*/
Route::get('/admin/dashboard/all-manager-profile', [App\Http\Controllers\Admin\ManagerProfileController::class, 'allManager'])->name('all.manager.profile');

Route::get('/admin/dashboard/all-loan-officer-profile', [App\Http\Controllers\Admin\OfficerProfileController::class, 'allOfficer'])->name('all.officer.profile');

Route::get('/admin/dashboard/all-rejected-profile', [App\Http\Controllers\Admin\RejectedProfileController::class, 'rejectedProfile'])->name('all.rejected.profile');

/*-------------------Admin Panel Route End Here----------------------*/


























/*--------------------Loan Manager Route Start ----------------------------*/
Route::get('/home/create-loan-officer', [App\Http\Controllers\Manager\ManagerController::class, 'create'])->name('create.loan.officer');
Route::post('/home/create-loan-officer', [App\Http\Controllers\Manager\ManagerController::class, 'create_loan_officer'])->name('create.loan.officer');
Route::get('/home/create-loan-officer/edit/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loan_officer_edit'])->name('edit.loan.officer');
Route::post('/home/create-loan-officer/edit/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loan_officer_update'])->name('edit.loan.officer');
Route::get('/home/loan-member-list', [App\Http\Controllers\Manager\ManagerController::class, 'loanMemberList'])->name('loan.member.list');
Route::get('/home/member-profile-view/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'memberProfileView'])->name('member.profile-view');

Route::get('/home/loan-approve/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loanApprove'])->name('loan.approve');
Route::post('/home/loan-rejected/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loanRejected'])->name('loan.rejected');
Route::get('/home/loan-member/edit/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loanmember_Edit'])->name('loan.member.edit');
Route::post('/home/loan-member/edit/{id}', [App\Http\Controllers\Manager\ManagerController::class, 'loanmember_UpdateRequest'])->name('loan.member.update.request');

Route::get('/home/manager/profile-settings', [App\Http\Controllers\Manager\ProfileSettingsController::class, 'profile_form'])->name('manager.profile.settings');
Route::post('/home/manager/profile-settings', [App\Http\Controllers\Manager\ProfileSettingsController::class, 'profile_change'])->name('manager.profile.settings');
Route::get('/home/manager/print-single-user/{id}', [App\Http\Controllers\Manager\PrintController::class, 'singleUser_print'])->name('print.single.user');
/*--------------------Loan Manager Route End ----------------------------*/





Route::get('/home/notice/{id}', [App\Http\Controllers\HomeController::class, 'NotificationView'])->name('notification.view');





/*---------------------Loan Officer Admin Panel Route----------------------------------*/

Route::get('/home/create-user-profile', [App\Http\Controllers\Officer\OfficerController::class, 'userProfile_form'])->name('user.form');
Route::post('/home/create-user-profile', [App\Http\Controllers\Officer\OfficerController::class, 'userProfile_post'])->name('user.form');
Route::get('/home/loan-officer-member-list', [App\Http\Controllers\Officer\MemberController::class, 'LoanOfficerMemberList'])->name('loacofficer.member.list');
Route::get('/home/loan-officer/view-member-profile/{id}', [App\Http\Controllers\Officer\MemberController::class, 'OfficerMemberView'])->name('loanofficer.member.view.profile');
Route::get('/home/loan-officerdashboard/loan-submit', [App\Http\Controllers\Officer\SmsController::class, 'LoanSubmit'])->name('loan.submit');

// Bad Ace
Route::get('/home/loan/officer/send-sms/{id}', [App\Http\Controllers\Officer\SmsController::class, 'sendSms'])->name('send.sms');
// Bad Ace

Route::get('/home/loan-officer/profile-settings', [App\Http\Controllers\Officer\ProfileSettingsController::class, 'profile_form'])->name('officer.profile.settings');
Route::post('/home/loan-officer/profile-settings', [App\Http\Controllers\Officer\ProfileSettingsController::class, 'profile_change'])->name('officer.profile.settings');
Route::post('/getForminfo', [App\Http\Controllers\Officer\LoanEntryController::class, 'getForminfo']);
Route::post('/home/loan-officer/loan-entry/', [App\Http\Controllers\Officer\LoanEntryController::class, 'loanEntry'])->name('loan.amount.entry');
Route::get('/home/loan-officer/loan-recive', [App\Http\Controllers\LoanReciveController::class, 'loanEntry'])->name('loan.amount.entry.form');

/*---------------------Loan Officer Admin Panel Route End Here----------------------------------*/
