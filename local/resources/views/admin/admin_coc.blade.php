@extends('layouts.app')
@section('content')
    <div class="container">
      <div>
        <h3>Student Code of Conduct List</h3>
      </div>

      <table id="studentRequests" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Request Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Your table data goes here -->
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Leave Application</td>
                <td>Pending</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>Grade Change Request</td>
                <td>Approved</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#studentRequests').DataTable();
      });
    </script>

@endsection
