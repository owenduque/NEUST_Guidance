<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Appointments;
use App\Models\Drops;
use App\Models\GoodMorals;
use App\Models\Concerns;
use App\Models\RequestHistory;
use DateTime;

class RequestController extends Controller
{
    protected function getStudentData($user_id){
        return $student = Student::where('user_id', $user_id)->first();
    }

    public function submitAppointmentRequest(Request $request){

        $rules = [
            'appointmentDate' => 'required|date|after_or_equal:today',
            'appointmentTime' => 'required|date_format:H:i|after:08:00|before:17:00',
            'durationFrom' => 'required|date_format:H:i|after:08:00|before:17:00',
            'durationTo' => 'required|date_format:H:i|after:08:00|before:17:00',
            'subject' => 'required|string|max:255',
            'reason' => 'required|string|max:255'
        ];

        $messages = [
            'appointmentDate.after_or_equal' => 'Appointment date not available.',
            'appointmentTime.after' => 'Appointment time must be after 8:00 am.',
            'appointment_time.before' => 'Appointment time must be before 5:00 pm.',
            'durationFrom.after' => 'Appointment time must be after 8:00 am.',
            'durationFrom.before' => 'Appointment time must be before 5:00 pm.',
            'durationTo.after' => 'Appointment time must be after 8:00 am.',
            'durationTo.before' => 'Appointment time must be before 5:00 pm.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dateTimeFrom = new DateTime($request->input('durationFrom'));
        $dateTimeTo = new DateTime($request->input('durationTo'));

        $timeDifference = $dateTimeFrom->diff($dateTimeTo);

        $totalMinutes = $timeDifference->i + ($timeDifference->h * 60);         //add limit min and max

        $student = $this->getStudentData(Auth::user()->id);

        $appointmentData = [
            'student_id' => $student->user_id,
            'appointment_date' => $request->input('appointmentDate'),
            'appointment_time' => $request->input('appointmentTime'),
            'appointment_time_from' => $request->input('durationFrom'),
            'appointment_time_to' => $request->input('durationTo'),
            'duration' => $totalMinutes,
        	'subject' => $request->input('subject'),
            'status' => 1,
            'reason' => $request->input('reason'),
            'counselor_id' => 1,
        ];


        try {
            $appointment = Appointments::create($appointmentData);

            $history = [
                'request_type' => 2,
                'request_id' => $appointment->id,
                'student_id' => $student->user_id,
                'status' => 1,
            ];

            $status = RequestHistory::create($history);

            return redirect()->back()->with(['status' => 'Request submitted!']);

        } catch (Exception $e) {
            // Log the exception or perform error handling
            Log::error('Error inserting: ' . $e->getMessage());

            return redirect()->back()->with(['status' => 'An error occurred while processing your request. Please try again later.']);
        }


    }

    public function submitDropRequest(Request $request){

        $rules = [
            'requestDate' => 'required|date|after_or_equal:today',
            'reason' => 'required|string|max:255'
        ];

        $messages = [
            'requestDate.after_or_equal' => 'Appointment date not available.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $student = $this->getStudentData(Auth::user()->id);

        $requestData = [
            'student_id' => $student->user_id,
        	'request_date' => $request->input('requestDate'),
            'status' => 1,
            'reason' => $request->input('reason'),
            'counselor_id' => 1,
        ];

        try {
            $request_drop = Drops::create($requestData);

            $history = [
                'request_type' => 3,
                'request_id' => $request_drop->id,
                'student_id' => $student->user_id,
                'status' => 1,
            ];

            $status = RequestHistory::create($history);

            return redirect()->back()->with(['status' => 'Request submitted!']);

        } catch (Exception $e) {
            // Log the exception or perform error handling
            Log::error('Error inserting: ' . $e->getMessage());

            return redirect()->back()->with(['status' => 'An error occurred while processing your request. Please try again later.']);
        }
    }

    public function submitMoralRequest(Request $request){

        $rules = [
            'requestDate' => 'required|date|after_or_equal:today',
            'reason' => 'required|string|max:255'
        ];

        $messages = [
            'requestDate.after_or_equal' => 'Appointment date not available.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $student = $this->getStudentData(Auth::user()->id);

        $requestData = [
            'student_id' => $student->user_id,
        	'request_date' => $request->input('requestDate'),
            'status' => 1,
            'reason' => $request->input('reason'),
            'counselor_id' => 1,
        ];

        try {
            $request_gm = GoodMorals::create($requestData);

            $history = [
                'request_type' => 4,
                'request_id' => $request_gm->id,
                'student_id' => $student->user_id,
                'status' => 1,
            ];

            $status = RequestHistory::create($history);

            return redirect()->back()->with(['status' => 'Request submitted!']);

        } catch (Exception $e) {
            // Log the exception or perform error handling
            Log::error('Error inserting: ' . $e->getMessage());

            return redirect()->back()->with(['status' => 'An error occurred while processing your request. Please try again later.']);
        }

    }

    public function submitReportRequest(Request $request){

        $student = $this->getStudentData(Auth::user()->id);

        try {
            $request_concern = Concerns::create($request->all()); // wala validation

            $history = [
                'request_type' => 1,
                'request_id' => $request_concern->id,
                'student_id' => $student->user_id,
                'status' => 1,
            ];

            $status = RequestHistory::create($history);

            return redirect()->back()->with(['status' => 'Request submitted!']);

        } catch (Exception $e) {
            // Log the exception or perform error handling
            Log::error('Error inserting appointment: ' . $e->getMessage());

            return redirect()->back()->with(['status' => 'An error occurred while processing your request. Please try again later.']);
        }
    }
}
