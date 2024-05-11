<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Drops;
use App\Models\GoodMorals;
use App\Models\Concerns;
use App\Models\RequestType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use DataTables;

class FetchController extends Controller
{
    protected function getStudentData($user_id){
        return $student = Student::where('user_id', $user_id)->first();
    }

    //fetch for users
    public function fetchAppointmentRequest(Request $request){
        if ($request->ajax()) {

            $student = $this->getStudentData(Auth::user()->id);

            if ($student) {
                $user_appointments = Appointments::where('student_id', $student->user_id)->get();

                return DataTables::of($user_appointments)
                    ->addIndexColumn()
                    ->addColumn('appointment_status', function($row){
                        $status = DB::table('status')->where('id', $row->status)->value('status');
                        return $status;
                    })
                    ->rawColumns(['appointment_status'])
                    ->make(true);
            } else {
                return response()->json(['error' => 'Student data not found'], 404);
            }
        }
    }

    public function fetchDropRequest(Request $request){
        if ($request->ajax()) {

            $student = $this->getStudentData(Auth::user()->id);

            if ($student) {
                $user_drops = Drops::where('student_id', $student->user_id)->get();

                return DataTables::of($user_drops)
                    ->addIndexColumn()
                    ->addColumn('appointment_status', function($row){
                        $status = DB::table('status')->where('id', $row->status)->value('status');
                        return $status;
                    })
                    ->rawColumns(['appointment_status'])
                    ->make(true);
            } else {
                return response()->json(['error' => 'Student data not found'], 404);
            }
        }
    }
    public function fetchGoodMoralRequest(Request $request){
        if ($request->ajax()) {

            $student = $this->getStudentData(Auth::user()->id);

            if ($student) {
                $user_gm_request = GoodMorals::where('student_id', $student->user_id)->get();

                return DataTables::of($user_gm_request)
                    ->addIndexColumn()
                    ->addColumn('appointment_status', function($row){
                        $status = DB::table('status')->where('id', $row->status)->value('status');
                        return $status;
                    })
                    ->rawColumns(['appointment_status'])
                    ->make(true);
            } else {
                return response()->json(['error' => 'Student data not found'], 404);
            }
        }
    }





    //fetch for counselor
    public function fetchStudentsAll(Request $request){
        if ($request->ajax()) {

            $students = Student::all();

            return DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('fullname', function ($row) {
                    $name = $row->firstname . ' ' . $row->middlename . ' ' . $row->lastname;
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-trash" style="color: white;"></i></button>
                                <button class="btn" style="background-color:  rgb(1, 86, 1);color:#fff;"><i class="bi bi-eye" style="color: white;"></i> Details</button>
                                ';
                    return $actionBtn;
                })
                ->addColumn('profile_status', function($row){
                    $status = 'Completed';
                    $student = Student::find($row->id);

                    if ($student) {
                        foreach ($student->getAttributes() as $attribute => $value) {
                            if (is_null($value)) {
                                $status = 'Need to update';
                                break;
                            }
                        }
                    }

                    return $status;
                })
                ->rawColumns(['action', 'fullname', 'profile_status'])
                ->make(true);
        }
    }

    public function fetchDropRequest2(Request $request){
        if ($request->ajax()) {

            $drop_requests = Drops::all();

            return DataTables::of($drop_requests)
                ->addIndexColumn()
                ->addColumn('action', function ($row){
                    $actionBtn = '
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-archive" style="color: white;"></i></button>
                                ';
                    return $actionBtn;
                })
                ->addColumn('drop_status', function($row){
                    $status = DB::table('status')->where('id', $row->status)->value('status');
                    return $status;
                })
                ->rawColumns(['action', 'drop_status'])
                ->make(true);
        }
    }

    public function fetchGoodMoralRequest2(Request $request){
        if ($request->ajax()) {

            $good_morals = GoodMorals::all();

            return DataTables::of($good_morals)
                ->addIndexColumn()
                ->addColumn('action', function ($row){
                    $actionBtn = '
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-archive" style="color: white;"></i></button>                                ';
                    return $actionBtn;
                })
                ->addColumn('gm_status', function($row){
                    $status = DB::table('status')->where('id', $row->status)->value('status');
                    return $status;
                })
                ->rawColumns(['action', 'gm_status'])
                ->make(true);
        }
    }

    public function fetchReports(Request $request){
        if ($request->ajax()) {

            $reports = Concerns::all();

            return DataTables::of($reports)
                ->addIndexColumn()
                ->addColumn('action', function ($row){
                    $actionBtn = '
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-trash" style="color: white;"></i></button>
                                <button class="btn" style="background-color:  rgb(1, 86, 1);color:#fff;"><i class="bi bi-eye" style="color: white;"></i> Details</button>
                                ';
                    return $actionBtn;
                })
                ->addColumn('report_status', function($row){
                    $status = DB::table('status')->where('id', $row->status)->value('status');
                    return $status;
                })
                ->rawColumns(['action', 'report_status'])
                ->make(true);
        }
    }

    public function fetchAppointmentRequest2(Request $request){
        if ($request->ajax()) {

            $requests = Appointments::all();

            return DataTables::of($requests)
                ->addIndexColumn()
                ->addColumn('action', function ($row){
                    $actionBtn = '
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                                <button class="btn" style="background-color:  rgb(1, 86, 1);"><i class="bi bi-trash" style="color: white;"></i></button>
                                <button class="btn" style="background-color:  rgb(1, 86, 1);color:#fff;"><i class="bi bi-eye" style="color: white;"></i> Details</button>
                                ';
                    return $actionBtn;
                })
                ->addColumn('appointment_status', function($row){
                    $status = DB::table('status')->where('id', $row->status)->value('status');
                    return $status;
                })
                ->rawColumns(['action', 'appointment_status'])
                ->make(true);
        }
    }

    public function fetchSardoRecords(Request $request){
        if ($request->ajax()) {

            $sardo = DB::table('grade_level')->get();

            return DataTables::of($sardo)
                ->addIndexColumn()
                ->addColumn('sardo', function ($row){
                    $no_of_sardo = Drops::leftJoin('students', 'drop_request.student_id', '=', 'students.user_id')
                                        ->leftJoin('grade_level', 'students.current_grade', '=', 'grade_level.id')
                                        ->where('grade_level.id', $row->id)
                                        ->count();;
                    return $no_of_sardo;
                })
                ->rawColumns(['sardo'])
                ->make(true);
        }
    }
}
