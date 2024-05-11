@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container" style="max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2>Request for Dropping</h2>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('user.request.drop') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <div class="form-group mb-3">
                <label for="requestDate">Request Date: (Please specify the date of your dropping.)</label>
                <input type="date" class="form-control" id="requestDate" name="requestDate" required>
                @error('requestDate')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="reason">Reason: (Please justify your reason.)</label>
                <textarea class="form-control" id="reason" name="reason" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>

    <div class="drop-table-container mt-5 shadow-lg">
        <h5>Recent Drop Request</h5>
        <table id="DropList" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Requested On</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function(){
        $('#DropList').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                method: 'get',
                url: "{{ route('fetch.user.drop.request') }}",
            },
            columns: [
                {data: 'drop_request_id', name: 'drop_request_id'},
                {data: 'appointment_status', name: 'appointment_status'},
                {data: 'reason', name: 'reason'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });

    function validateForm() {
        validated = true;
        var inputs = document.querySelectorAll('input, textarea');

        inputs.forEach(function(input) {
            if (input.value.trim() === '' && input.required) {
                alert('Please fill out all required fields.');
                input.focus();
                validated = false;
            }
        });

        return validated;
    }
</script>
@endsection
