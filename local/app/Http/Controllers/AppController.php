<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $response = $next($request);
        //     $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        //     $response->header('Pragma', 'no-cache');
        //     $response->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
        //     return $response;
        // });
    }

    public function viewDashboard(){
        return view('user.user_home');
    }

    public function viewReportForm(){
        return view('user.user_report_form');
    }

    public function viewAppointments(){
        return view('user.user_appointments');
    }

    public function viewCOC(){
        return view('user.user_coc');
    }

    public function viewProfile() {
        $student = Student::where('user_id', Auth::user()->id)->first();

        return view('user.user_profile', ['student' => $student]);
    }

    public function viewFormAppointment(){
        return view('user.request_forms.request_appointment');
    }

    public function viewFormDrop(){
        return view('user.request_forms.request_dropform');
    }

    public function viewFormMoral(){
        return view('user.request_forms.request_goodmoral');
    }

}
