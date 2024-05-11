@extends('layouts.app')
@section('content')

    <div class="container">
      <div>
        <h3>Student Concern List</h3>
      </div>

      <table id="appointmentList" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
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
                url: "{{ route('fetch.counselor.reports') }}",
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'report_status', name: 'report_status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},
            ]
        });
      });
    </script>

@endsection
