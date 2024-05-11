@extends('layouts.app')
@section('content')
<div class="view-appointment-container container shadow-lg">
    <div>
      <h1>Recent Appointments</h1>
    </div>

    <table id="appointmentList" class="display">
      <thead>
          <tr>
              <th>#</th>
              <th>Appointment Date</th>
              <th>Appointment Time</th>
              <th>From</th>
              <th>To</th>
              <th>Duration</th>
              <th>About</th>
              <th>Reason</th>
              <th>Status</th>
              <th>Requested On</th>
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
                url: "{{ route('fetch.user.appointments') }}",
            },
            columns: [
                {data: 'appointment_id', name: 'appointment_id'},
                {data: 'appointment_status', name: 'appointment_status'},
                {data: 'appointment_date', name: 'appointment_date'},
                {data: 'appointment_time', name: 'appointment_time'},
                {data: 'appointment_time_from', name: 'appointment_time_from'},
                {data: 'appointment_time_to', name: 'appointment_time_to'},
                {data: 'duration', name: 'duration'},
                {data: 'subject', name: 'subject'},
                {data: 'reason', name: 'reason'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });
  </script>
@endsection
