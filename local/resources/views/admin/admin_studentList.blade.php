@extends('layouts.app')
@section('content')
    <div class="container">
      <div>
        <h3>Student List</h3>
      </div>

      <table id="studentList" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile Status</th>
                <th>Profile Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>LRN</th>
                <th>Action</th>
            </tr>
        </thead>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#studentList').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                method: 'get',
                url: "{{ route('fetch.counselor.studentList') }}",
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'profile_status', name: 'profile_status'},
                {data: 'student_img', name: 'student_img'},
                {data: 'fullname', name: 'fullname', orderable: false, searchable: false},
                {data: 'email', name: 'email'},
                {data: 'lrn', name: 'lrn'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
      });
    </script>

@endsection
