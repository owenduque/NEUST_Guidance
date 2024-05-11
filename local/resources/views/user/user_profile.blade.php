@extends('layouts.app')
@section('content')
<style>
.profile{
    width: 200px;
    position: relative;
}
img{
    width: 200px;
    display:block;
    margin: auto;
    border-radius: 15px;
}

.edit-profile{
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    position: absolute;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    opacity: 0;
    transition:0.6s;
    border-radius: 15px;
}
.edit-profile:hover{
    opacity: 1;
    color: white;
    cursor: pointer;
}

.edit-profile i{
    font-size: 30px;
}


</style>
<div class="profile-container shadow-lg">
    <h1 class="welcome">Welcome {{ $student->firstname }} to your Profile</h1>
    {{-- <p>You are {{ $student->firstname }} {{ $student->lastname }}</p> --}}
    {{-- <div class="mb-4">
        <img src="{{ asset('img/mark.png') }}" class="rounded float-start" alt="" style="width: 200px;">
    </div> --}}
    <div class="wrapper mb-4 mt-4">
        <div class="profile">
            <img src="{{ asset('img/mark.png') }}" alt="">
            <div class="edit-profile">
                <label for="file-upload" class="edit-icon"><i class="bi bi-pencil-square"></i></label>
                <input type="file" id="file-upload" style="display: none;">
            </div>
        </div>
    </div>
    {{-- <div class="mb-4 position-relative">
        <label for="profile_picture" class="form-label">Profile Picture:</label>
        <div class="mt-2">
            <img id="preview_image" src="{{ asset('img/mark.png') }}" class="rounded float-start profile-picture" alt="" style="width: 200px;">
            <span class="edit-icon"><i class="bi bi-pencil-square"></i></span>
        </div>
    </div> --}}
    <div class="row">
        <div class="col mb-4">
            <button class="btn btn-primary">
                <i class="bi bi-pencil-square"></i>
                Edit Profile
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Name:</span>
                <input type="text" class="form-control" value="{{ $student->firstname }}" name="name" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Address:</span>
                <input type="text" class="form-control" value="{{ $student->municipality . ' ' .  $student->province}}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Birthday:</span>
                <input type="text" class="form-control" value="{{ $student->birthday }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nationality:</span>
                <input type="text" class="form-control" value="{{ $student->nationality }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Father:</span>
                <input type="text" class="form-control" value="{{ $student->father }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Mother:</span>
                <input type="text" class="form-control" value="{{ $student->mother }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Living with whom:</span>
                <input type="text" class="form-control" value="{{ $student->living_with }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">LRN:</span>
                <input type="text" class="form-control" value="{{ $student->lrn }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Contact no:</span>
                <input type="text" class="form-control" value="{{ $student->contact_no }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Age:</span>
                <input type="text" class="form-control" value="{{ $student->age }}" readonly>
                <span class="input-group-text" id="inputGroup-sizing-default">Sex:</span>
                <input type="text" class="form-control" value="{{ $student->sex }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Religion:</span>
                <input type="text" class="form-control" value="{{ $student->religion }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Occupation:</span>
                <input type="text" class="form-control" value="{{ $student->father_occupation }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Occupation:</span>
                <input type="text" class="form-control" value="{{ $student->mother_occupation }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">No. of Siblings:</span>
                <input type="text" class="form-control" value="{{ $student->no_of_siblings }}" readonly>
                <span class="input-group-text" id="inputGroup-sizing-default">Position:</span>
                <input type="text" class="form-control" value="{{ $student->position }}" readonly>
            </div>
        </div>
    </div>
    <h3 class="">EDUCATIONAL BACKGROUND</h3>
    <div class="row">  
        <div class="col-md">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Elementary School Graduate:</span>
                <input type="text" class="form-control" value="{{ $student->elem_school }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Last Grade Level Completed:</span>
                <input type="text" class="form-control" value="{{ $student->last_grade_completed }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">School Address:</span>
                <input type="text" class="form-control" value="{{ $student->school_address }}" readonly>
                <span class="input-group-text" id="inputGroup-sizing-default">School ID:</span>
                <input type="text" class="form-control" value="{{ $student->school_id }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">School Year:</span>
                <input type="text" class="form-control" value="{{ $student->school_year_start . ' to ' . $student->school_year_end }}" readonly>
                <span class="input-group-text" id="inputGroup-sizing-default">Gen. Ave:</span>
                <input type="text" class="form-control" value="{{ $student->gen_average }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Grade Level & Section:</span>
                <input type="text" class="form-control" value="{{ $student->current_grade }}" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">School Year:</span>
                <input type="text" class="form-control" value="{{ $student->current_year_start . ' to ' . $student->current_year_start }}" readonly>
                <span class="input-group-text" id="inputGroup-sizing-default">Adviser:</span>
                <input type="text" class="form-control" value="{{ $student->adviser }}" readonly>
            </div>
        </div>
    </div>
</div>
@endsection
