@extends('layouts.app')
@section('content')
    <div class="container">
      <div>
        <h3>SARDO-STDUDENT AT RISK OF DROPPING-OUT</h3>
      </div>

      <table id="sardoRecords" class="display">
        <thead>
            <tr>
                <th>Grade Level</th>
                <th>No. of Under SARDO</th>
            </tr>
        </thead>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#sardoRecords').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                method: 'get',
                url: "{{ route('fetch.counselor.sardo') }}",
            },
            columns: [
                {data: 'grade_level', name: 'grade_level'},
                {data: 'sardo', name: 'sardo'},
            ]
        });
      });
    </script>

@endsection
