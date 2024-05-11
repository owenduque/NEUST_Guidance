@extends('layouts.app')
@section('content')

    <div class="container">
      <div>
        <h3>Appointment List</h3>
      </div>

      <table id="appointmentList" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>About</th>
                <th>Reason</th>
                <th>Date</th>
                <th>Time</th>
                <th>(from)</th>
                <th>(to)</th>
                <th>Duration (min)</th>
                <th>Requested on</th>
                <th>Action</th>
            </tr>
        </thead>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#appointmentList').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                method: 'get',
                url: "{{ route('fetch.counselor.appointment.requests') }}",
            },
            columns: [
                {data: 'appointment_id', name: 'appointment_id'},
                {data: 'appointment_status', name: 'appointment_status'},
                {data: 'subject', name: 'subject'},
                {data: 'reason', name: 'reason'},
                {data: 'appointment_date', name: 'appointment_date'},
                {data: 'appointment_time', name: 'appointment_time'},
                {data: 'appointment_time_from', name: 'appointment_time_from'},
                {data: 'appointment_time_to', name: 'appointment_time_to'},
                {data: 'duration', name: 'duration'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},
            ]
        });
      });
    </script>

@endsection
