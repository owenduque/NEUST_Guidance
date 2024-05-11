@extends('layouts.app')
@section('content')
<style>
.report-content {
    font-family: 'Times New Roman', Times, serif;
    margin: auto;
    text-align: center;
}
.sub-title h4{
    font-size: 18px;
    margin-bottom: 0;
}
.deped{
    font-family: 'Old English Text MT', serif;
}

.table-title {
    margin-left: -30px;
    text-align: left;
}

.title {
    margin-left: -80px;
    text-align: left;
}

.table-container {
    margin: 0 auto; /* Center the table-container */
    text-align: left;
    max-width: 100%; /* Set a maximum width for the table-container */
}

td{
    padding-right: 5px;
}
input[type="text"],
input[type="number"]{
    border: none;
    border-bottom: 1px solid black;
    width: 200px;
}

</style>
<div class="report-form-container">
    <h3>Report your concern</h3>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="report-content container">
        <div class="heading">
            <div class="deped">
                <h4>Republic of the Philippines</h4>
                <h2>Department of Education</h2>
            </div>
            <div class="sub-title">
                <h4 >REGION III - CENTRAL LUZON</h4>
                <h4>SCHOOLS DIVISION OFFICE OF NUEVA ECIJA</h4>
                <h4>BONGABON NATIONAL HIGHSCHOOL</h4>
                <h4>SINIPIT, BONGABON, NUEVA ECIJA</h4>
            </div>
        </div>
        <br>
        <div class="content">
            <form action="{{ route('user.request.report') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h5>I. IDENTIFYING INFORMATION</h5>
                </div>
                <div class="table-title">
                    <h5>A. VICTIM</h5>
                </div>
                    <div class="table-container">
                        <table>
                            <tr>
                                <td>Name: <input required type="text" name="victim_name" id="victim_name" style="width: 273px;"></td>
                                {{-- <td>Signature: <input type="text" name="victim_signature" id="victim_signature"></td> --}}
                            </tr>
                            <tr>
                                <td>Age: <input required type="number" min="0" max="99" name="victim_age" id="victim_age" style="width: 285px;"></td>
                                <td>Gender:
                                    <select type="text" name="victim_gender" id="victim_gender" style="width: 215px;">
                                        <option value="None" disabled selected>Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Grade & Section
                                    <select required type="text" name="victim_grade" id="victim_grade" style="width: 215px;">
                                        <option value="None" disabled selected>Select Grade Level</option>
                                        <option value="1">Grade 7</option>
                                        <option value="2">Grade 8</option>
                                        <option value="3">Grade 9</option>
                                        <option value="4">Grade 10</option>
                                    </select>
                                    <select required type="text" name="victim_section" id="victim_section" style="width: 215px;">
                                        <option value="None" disabled selected>Select Section</option>
                                        <option value="1">Section 1</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Parents/Guardian: <input required type="text" name="victim_parent_guardian" id="victim_parent_guardian"></td>
                                {{-- <td>Signature: <input type="text" name="parent_guardian_signature" id="parent_guardian_signature"></td> --}}
                            </tr>
                            <tr>
                                <td>Contact no: <input required type="number" min="0" name="victim_parent_contact" id="victim_parent_contact" style="width: 242px;"></td>
                            </tr>
                            <tr>
                                <td>Class Adviser: <input required type="text" name="victim_class_adviser" id="victim_class_adviser" style="width: 225px;"></td>
                                {{-- <td>Signature: <input type="text" name="adviser_signature" id="adviser_signature"></td> --}}
                            </tr>
                        </table>
                    </div>
                <div class="table-title">
                    <h5>B. COMPLAINANT</h5>
                </div>
                <div class="table-container">
                    <table>
                        <tr>
                            <td>Name: <input required type="text" name="complainant_name" id="complainant_name" style="width: 273px;"></td>
                            {{-- <td>Signature: <input type="text" name="complainant_signature" id="complainant_signature"></td> --}}
                        </tr>
                        <tr>
                            <td>Address: <input required type="text" name="complainant_address" id="complainant_address" style="width: 260px;"></td>
                        </tr>
                        <tr>
                            <td>Contact no: <input required type="number" name="complainant_contact" id="complainant_contact" style="width: 242px;"></td>
                        </tr>
                        <tr>
                            <td>Relation to the Victim: <input required type="text" name="relation_to_victim" id="relation_to_victim" style="width: 173px;"></td>
                        </tr>
                    </table>
                </div>
                <div class="table-title">
                    <h5>C. OFFENDER/S</h5>
                </div>
                <div class="table-container">
                    <table>
                        <tr>
                            <td>Name: <input required type="text" name="offender_name" id="offender_name" style="width: 273px;"></td>
                            {{-- <td>Signature: <input type="text" name="offender_signature" id="offender_signature"></td> --}}
                        </tr>
                        <tr>
                            <td>Age: <input required type="number" min="0" max="99" name="offender_age" id="offender_age" style="width: 285px;"></td>
                            <td>Gender:
                                <select type="text" name="offender_gender" id="offender_gender" style="width: 215px;">
                                    <option value="None" disabled selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Grade & Section
                                <select required type="text" name="offender_grade" id="offender_grade" style="width: 215px;">
                                    <option value="None" disabled selected>Select Grade Level</option>
                                    <option value="1">Grade 7</option>
                                    <option value="2">Grade 8</option>
                                    <option value="3">Grade 9</option>
                                    <option value="4">Grade 10</option>
                                </select>
                                <select required type="text" name="offender_section" id="offender_section" style="width: 215px;">
                                    <option value="None" disabled selected>Select Section</option>
                                    <option value="1">Section 1</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Parents/Guardian: <input required type="text" name="offender_parent_guardian" id="offender_parent_guardian"></td>
                            {{-- <td>Signature: <input type="text" name="offender_parent_guardian_signature" id="offender_parent_guardian_signature"></td> --}}
                        </tr>
                        <tr>
                            <td>Contact no: <input required type="number" min="0" name="offender_parent_contact" id="offender_parent_contact" style="width: 242px;"></td>
                        </tr>
                        <tr>
                            <td>Class Adviser: <input required type="text" name="offender_class_adviser" id="offender_class_adviser" style="width: 225px;"></td>
                            {{-- <td>Signature: <input type="text" name="offender_adviser_signature" id="offender_adviser_signature"></td> --}}
                        </tr>
                    </table>
                </div>
                {{-- <div>
                    <h5 class="title">II. PROBLEM PRESENTED</h5>
                    <div class="description">
                        <textarea name="problem" id="problem" cols="80"></textarea>
                    </div>
                    <h6 class="title">Action Taken:</h6>
                    <div class="description">
                        <textarea name="actionTaken" id="actionTaken" cols="80"></textarea>
                    </div>
                    <h6 class="title">Recommendation:</h6>
                    <div class="description">
                        <textarea name="recommendation" id="recommendation" cols="80"></textarea>
                    </div>
                </div> --}}
                <div class="mt-5">
                    <button type="submit" class="btn btn-secondary">Report Concern</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

