<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'redirectPage']);

Route::middleware(['guest', 'preventBackHistory'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware(\App\Http\Middleware\RedirectIfAuthenticated::class);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware(\App\Http\Middleware\RedirectIfAuthenticated::class);
    Route::post('/register', [RegisterController::class, 'register']);
});

//ADMIN
Route::middleware(['auth', 'userAuth:1', 'preventBackHistory'])->group(function () {
    //sidebars
    Route::get('/admin', [AdminController::class, 'viewDashboard'])->name('admin.viewDashboard');
    Route::get('/admin/students', [AdminController::class, 'viewStudentList'])->name('admin.viewStudentList');
    Route::get('/admin/createmodule', [AdminController::class, 'viewCreateModule'])->name('admin.viewCreateModule');
    Route::get('/admin/coc', [AdminController::class, 'viewCOC'])->name('admin.viewCOC');
    Route::get('/admin/requests', [AdminController::class, 'viewRequests'])->name('admin.viewRequests');
    Route::get('/admin/reports', [AdminController::class, 'viewReports'])->name('admin.viewReports');
    Route::get('/admin/appointments', [AdminController::class, 'viewAppointments'])->name('admin.viewAppointments');
    Route::get('/admin/srdRecords', [AdminController::class, 'viewSrdRecords'])->name('admin.viewSrdRecords');
    Route::get('/admin/addaccount', [AdminController::class, 'viewAddAccount'])->name('admin.viewAddAccount');

    //forms
    Route::get('/admin/form/moral', [AdminController::class, 'viewGoodMoralCert'])->name('admin.viewGoodMoralCert');
    Route::get('/admin/form/visit', [AdminController::class, 'viewHomeVisitationForm'])->name('admin.viewHomeVisitationForm');
    Route::get('/admin/form/referral', [AdminController::class, 'viewReferralForm'])->name('admin.viewReferralForm');
    Route::get('/admin/form/travel', [AdminController::class, 'viewTravelForm'])->name('admin.viewTravelForm');

    //fetching
    Route::get('fetch-counselor-studentList', [FetchController::class, 'fetchStudentsAll'])->name('fetch.counselor.studentList');
    Route::get('fetch-counselor-reports', [FetchController::class, 'fetchReports'])->name('fetch.counselor.reports');
    Route::get('fetch-counselor-drop-requests', [FetchController::class, 'fetchDropRequest2'])->name('fetch.counselor.drop.requests');
    Route::get('fetch-counselor-gm-requests', [FetchController::class, 'fetchGoodMoralRequest2'])->name('fetch.counselor.gm.requests');
    Route::get('fetch-counselor-appointments', [FetchController::class, 'fetchAppointmentRequest2'])->name('fetch.counselor.appointment.requests');
    Route::get('fetch-counselor-sardo', [FetchController::class, 'fetchSardoRecords'])->name('fetch.counselor.sardo');
});

//STUDENTS
Route::middleware(['auth', 'userAuth:2', 'preventBackHistory'])->group(function () {
    //sidebars
    Route::get('/user', [AppController::class, 'viewDashboard'])->name('user.viewDashboard');
    Route::get('/user/report', [AppController::class, 'viewReportForm'])->name('user.viewReportForm');
    Route::get('/user/appointments', [AppController::class, 'viewAppointments'])->name('user.viewAppointments');
    Route::get('/user/code', [AppController::class, 'viewCOC'])->name('user.viewCOC');
    Route::get('/user/profile/', [AppController::class, 'viewProfile'])->name('user.viewProfile');

    //forms
    Route::get('/user/form/appointment', [AppController::class, 'viewFormAppointment'])->name('user.viewFormAppointment');
    Route::get('/user/form/drop', [AppController::class, 'viewFormDrop'])->name('user.viewFormDrop');
    Route::get('/user/form/moral', [AppController::class, 'viewFormMoral'])->name('user.viewFormMoral');

    //requests
    Route::post('user/request/appointment', [RequestController::class, 'submitAppointmentRequest'])->name('user.request.appointment');
    Route::post('user/request/drop', [RequestController::class, 'submitDropRequest'])->name('user.request.drop');
    Route::post('user/request/moral', [RequestController::class, 'submitMoralRequest'])->name('user.request.moral');
    Route::post('user/request/report', [RequestController::class, 'submitReportRequest'])->name('user.request.report');

    //fetching
    Route::get('fetch-user-appointments', [FetchController::class, 'fetchAppointmentRequest'])->name('fetch.user.appointments');
    Route::get('fetch-user-drop-request', [FetchController::class, 'fetchDropRequest'])->name('fetch.user.drop.request');
    Route::get('fetch-user-gm-request', [FetchController::class, 'fetchGoodMoralRequest'])->name('fetch.user.gm.request');
});

// Route::group(['middleware' => ['userAuth:2','preventBackHistory']], function() {
//     Route::get('/user', [AppController::class, 'viewDashboard'])->name('user.viewDashboard');
//     Route::get('/user/report', [AppController::class, 'viewReportForm'])->name('user.viewReportForm');
//     Route::get('/user/appointments', [AppController::class, 'viewAppointments'])->name('user.viewAppointments');
//     Route::get('/user/code', [AppController::class, 'viewCOC'])->name('user.viewCOC');
//     Route::get('/user/profile/{email}', [AppController::class, 'viewProfile'])->name('user.viewProfile');

//     //forms
//     Route::get('/user/form/appointment', [AppController::class, 'viewFormAppointment'])->name('user.viewFormAppointment');
//     Route::get('/user/form/drop', [AppController::class, 'viewFormDrop'])->name('user.viewFormDrop');
//     Route::get('/user/form/moral', [AppController::class, 'viewFormMoral'])->name('user.viewFormMoral');
// });

// Route::group(['middleware' => ['userAuth:1','preventBackHistory']], function() {
//     Route::get('/admin', [AdminController::class, 'viewDashboard'])->name('admin.viewDashboard');
//     Route::get('/admin/students', [AdminController::class, 'viewStudentList'])->name('admin.viewStudentList');
//     Route::get('/admin/createmodule', [AdminController::class, 'viewCreateModule'])->name('admin.viewCreateModule');
//     Route::get('/admin/coc', [AdminController::class, 'viewCOC'])->name('admin.viewCOC');
//     Route::get('/admin/requests', [AdminController::class, 'viewRequests'])->name('admin.viewRequests');
//     Route::get('/admin/appointments', [AdminController::class, 'viewAppointments'])->name('admin.viewAppointments');
//     Route::get('/admin/srdRecords', [AdminController::class, 'viewSrdRecords'])->name('admin.viewSrdRecords');
// });



