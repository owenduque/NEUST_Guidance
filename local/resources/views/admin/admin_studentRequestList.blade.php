@extends('layouts.app')
@section('content')
<div class="container">
  <div class="mb-5">
      <div>
        <h3>List of Drop Request</h3>
      </div>
      <table id="dropRequest" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Reason</th>
                <th>Student ID</th>
                <th>Request Date</th>
                <th>Action</th>
            </tr>
        </thead>
      </table>
  </div>
  <div class="">
    <div>
      <h3>List of Good Moral Request</h3>
    </div>
    <table id="goodMoralRequest" class="display">
      <thead>
          <tr>
            <th>#</th>
            <th>Status</th>
            <th>Reason</th>
            <th>Student ID</th>
            <th>Request Date</th>
            <th>Action</th>
          </tr>
      </thead>
    </table>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
      $('#dropRequest').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                method: 'get',
                url: "{{ route('fetch.counselor.drop.requests') }}",
            },
            columns: [
                {data: 'drop_request_id', name: 'drop_request_id'},
                {data:'drop_status', name: 'drop_status'},
                {data:'reason', name: 'reason'},
                {data:'student_id', name: 'student_id'},
                {data:'request_date', name: 'request_date'},
                {data:'action', name: 'action'}
            ]
        });

        $('#goodMoralRequest').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                method: 'get',
                url: "{{ route('fetch.counselor.gm.requests') }}",
            },
            columns: [
                {data: 'request_id', name: 'request_id'},
                {data:'gm_status', name: 'gm_status'},
                {data:'reason', name: 'reason'},
                {data:'student_id', name: 'student_id'},
                {data:'request_date', name: 'request_date'},
                {data:'action', name: 'action'}
            ]
        });
  });
</script>

@endsection
