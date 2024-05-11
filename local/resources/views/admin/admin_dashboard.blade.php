@extends('layouts.app')
@section('content')

<style>
    .card-header{
        background-color: #001419;
    }
</style>
<div class="container">
    <h3 class="text-center mb-4">Dashboard</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 shadow">
                        <div class="card-header text-white">Number of Cases</div>
                        <div class="card-body" style="background-color:#7fe489;">
                            <p>Tracking the number of cases or incidents handled by administrators/counselors.</p>
                            <p>Actual Number: {{ $data['no_of_cases'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 shadow">
                        <div class="card-header text-white">Number of Request Forms</div>
                        <div class="card-body" style="background-color:#7fe489;">
                            <p>Tracking the number of request forms handled by administrators/counselors.</p>
                            <p>Actual Number: {{ $data['no_of_request_forms'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 shadow">
                        <div class="card-header text-white">Completed Appointments</div>
                        <div class="card-body" style="background-color:#7fe489;">
                            <p>Tracking the completed appointments handled by administrators/counselors.</p>
                            <p>Actual Number: {{ $data['completed_appointments'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 shadow">
                        <div class="card-header text-white">User Accounts</div>
                        <div class="card-body" style="background-color:#7fe489;">
                            <p>Tracking the user accounts handled by administrators/counselors.</p>
                            <p>Actual Number: {{ $data['no_of_students'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
