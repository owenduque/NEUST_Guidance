<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Guidance Management</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="icon" href="img/logo.png"></link> --}}
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        display: none; /* Initially hidden */
    }

    .spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 6px solid rgba(0, 0, 0, 0.1);
        border-left-color: #333; /* Change the color as needed */
        border-radius: 50%;
        width: 60px; /* Adjust the width */
        height: 60px; /* Adjust the height */
        animation: spin 4s linear infinite; /* Adjust the animation duration */
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>


<body>
    <div id="loading-overlay">
        <div class="spinner"></div>
      </div>
    <div id="app">
        <aside id="sidebar">
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="toggle-btn">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 50px;">
                <span><strong>GUIDANCE</strong></span>
                <span><strong>MANAGEMENT</strong></span>
            </label>
            <ul class="sidebar-nav">
                @guest
                @else
                    @if (Auth::user()->user_type == 2 )
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('user.viewDashboard') }}">
                                <i class="bi bi-house-door-fill"></i>
                                <span>Guidance Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">
                                <i class="bi bi-ui-checks"></i>
                                <span>{{ __('Request Forms') }}</span>
                            </a>
                            <ul id="submenu">
                                <li><a href="{{ route('user.viewFormAppointment') }}">Request Appointment</a></li>
                                <li><a href="{{ route('user.viewFormDrop') }}">Request for Dropping</a></li>
                                <li><a href="{{ route('user.viewFormMoral') }}">Request Good Moral Certificate</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('user.viewAppointments') }}">
                                <i class="bi bi-calendar-check"></i>
                                <span>{{ __('My Appointments') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('user.viewReportForm') }}">
                                <i class="bi bi-info-lg"></i>
                                <span>{{ __('Report Concern') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('user.viewCOC') }}">
                                <i class="bi bi-card-checklist"></i>
                                <span>{{ __('Code of Conduct') }}</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->user_type == 1)
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.viewDashboard') }}">
                                <i class="bi bi-house-door-fill"></i>
                                <span>Guidance Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.viewStudentList') }}">
                                <i class="bi bi-person-fill"></i>
                                <span class="nav-text">{{ __('Student List') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.viewReports') }}">
                                <i class="bi bi-person-exclamation"></i>
                                <span>{{ __('Manage Reports') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.viewRequests') }}">
                                <i class="bi bi-person-lines-fill"></i>
                                <span>{{ __('Manage Requests') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.viewAppointments') }}">
                                <i class="bi bi-calendar-check"></i>
                                <span>{{ __('Manage Appointments') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">
                                <i class="bi bi-ui-checks"></i>
                                <span>{{ __('Generate Forms') }}</span>
                            </a>
                            <ul id="submenu">
                                <li><a href="{{ route('admin.viewReferralForm') }}">Referral Form</a></li>
                                <li><a href="{{ route('admin.viewGoodMoralCert') }}">Good Moral Certificate</a></li>
                                <li><a href="{{ route('admin.viewHomeVisitationForm') }}">Home Visitation Form</a></li>
                                <li><a href="{{ route('admin.viewTravelForm') }}">Travel Order Form</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.viewSrdRecords') }}">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                <span>{{ __('SARDO Records') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.viewCreateModule') }}">
                                <i class="bi bi-file-earmark-plus-fill"></i>
                                <span>{{ __('Create Module') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.viewCOC') }}">
                                <i class="bi bi-file-earmark-text-fill"></i>
                                <span>{{ __('Code of Conduct') }}</span>
                            </a>
                        </li>
                    @endif

            </ul>
            <div class="sidebar-footer">
                @if(Auth::user()->user_type == 2)
                <a class="sidebar-link" href="{{ route('user.viewProfile') }}">
                    <i class="bi bi-person-circle"></i>
                    <span class="nav-text">
                        {{ Auth::user()->first_name}} {{ Auth::user()->last_name }}
                    </span>
                </a>
                @endif
                @if(Auth::user()->user_type == 1)
                <a class="sidebar-link" href="{{ route('admin.viewAddAccount') }}">
                    <i class="bi bi-person-plus"></i>
                    <span class="nav-text">Add Counselor
                    </span>
                </a>
                @endif
                <a class="sidebar-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endguest
        </aside>

        <main class="main">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    @if ($errors->has('error'))
    <script>
        swal("Error", "{{ $errors->first('error') }}", "error");
    </script>
    @endif

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
