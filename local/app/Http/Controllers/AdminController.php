<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        $data['no_of_cases'] = DB::table('student_concern')->count();
        $data['no_of_request_forms'] = DB::table('request_history')->where('request_type', '!=', 2)->count();
        $data['completed_appointments'] = DB::table('appointment_request')->where('status', 4)->count();
        $data['no_of_students'] = DB::table('students')->count();

        return view('admin.admin_dashboard', ['data' => $data]);
    }

    public function viewStudentList(){
        return view('admin.admin_studentList');
    }

    public function viewCreateModule(){
        return view('admin.admin_createModule');
    }

    public function viewCOC(){
        return view('admin.admin_coc');
    }

    public function viewRequests(){
        return view('admin.admin_studentRequestList');
    }

    public function viewReports(){
        return view('admin.admin_reportList');
    }

    public function viewAppointments(){
        return view('admin.admin_appointmentList');
    }

    public function viewSrdRecords(){
        return view('admin.admin_srdRecords');
    }

    public function viewGoodMoralCert(){
        return view('admin.request_forms.good_moral_cert');
    }
    public function viewHomeVisitationForm(){
        return view('admin.request_forms.home_visitation');
    }
    public function viewReferralForm(){
        return view('admin.request_forms.referral_form');
    }
    public function viewTravelForm(){
        return view('admin.request_forms.travel_form');
    }
    public function viewAddAccount(){
        return view('admin.admin_add_account');
    }

}
