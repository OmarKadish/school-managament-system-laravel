<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/base/vendor.bundle.base.css')}}">
    <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('/images/favicon.png')}}"/>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo me-5" href="/"><img src="" class="me-2"
                                                                           alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="/"><img src="" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="ti-view-list"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
{{--                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                 <i class="ti-search"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                               aria-label="search" aria-describedby="search">
                    </div>
                </li>--}}
            </ul>
            <ul class="navbar-nav navbar-nav-right">
{{--                <li class="nav-item dropdown me-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                       id="messageDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="ti-email mx-0"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>--}}
{{--                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                       data-bs-toggle="dropdown">
                        <i class="ti-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                         aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-warning">
                                    <i class="ti-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-info">
                                    <i class="ti-user mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li>--}}
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <img src="{{url('/images/'.auth()->user()->photo_path)}}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="ti-user"></i>
                            {{auth()->user()->name}}
                        </a>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                <i class="ti-power-off">
                                {{ __('Log Out') }}</i>
                            </a>

                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="ti-view-list"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="ti-shield menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-classroom" aria-expanded="false"
                       aria-controls="ui-classroom">
                        <i class="ti-menu-alt menu-icon"></i>
                        <span class="menu-title">Classrooms Management </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-classroom">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/classroom/create">Add new classroom</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="/classroom">Manage Classrooms</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-teacher" aria-expanded="false"
                       aria-controls="ui-teacher">
                        <i class="ti-briefcase menu-icon"></i>
                        <span class="menu-title">Teachers Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-teacher">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/teacher/create">Add Teacher</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/teacher">Manage Teachers</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-student" aria-expanded="false"
                       aria-controls="ui-student">
                        <i class="ti-id-badge menu-icon"></i>
                        <span class="menu-title">Students Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-student">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/student/create">Add Student</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="/student">Manage Students</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-subject" aria-expanded="false"
                       aria-controls="ui-subject">
                        <i class="ti-ruler-pencil menu-icon"></i>
                        <span class="menu-title">Subjects Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-subject">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/subject/create">Add Subject</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="/subject">Manage Subjects</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false"
                       aria-controls="users">
                        <i class="ti-user menu-icon"></i>
                        <span class="menu-title">Users Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/manager/create"> Add Manager </a></li>
                            <li class="nav-item"><a class="nav-link" href="/manager"> Manage Users </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->

        @yield('content')

        <!-- main-panel ends -->

    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- partial:partials/footer -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.linkedin.com/in/omar-kadish" target="_blank">Omar KADISH</a> 2021 - {{ date("Y") }}</span>
    </div>
</footer>
<!-- partial -->


<script type="text/javascript">
    $(function () {
        // Multiple images preview with JavaScript
        var multiImgPreview = function (input, imgPreviewPlaceholder) {
            if (imgPreviewPlaceholder.files) {
                imgPreviewPlaceholder.files.clear();
            }
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        var $clone = $($.parseHTML('<img>'));
                        $clone.attr('class', 'image_pr');
                        $clone.attr('style', 'max-width: 200px;');
                        $clone.attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);

                }
            }
        };
        $('#images').on('change', function () {
            multiImgPreview(this, 'div.preview-image');
        });
        $('#photo').on('change', function () {
            // To delete the uploaded photo from preview after selecting new photo
            var arr = document.getElementsByClassName('image_pr');
            if (arr.length) {
                for (var i = 0; i < arr.length; i++) {
                    arr[i].remove();
                }
            }
            multiImgPreview(this, 'div.preview-image');
        });
    });

</script>
<!-- plugins:js -->

<script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
<!-- inject:js -->
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
<script src="{{asset('js/todolist.js')}}"></script>
<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('js/file-upload.js')}}"></script>
<!-- endinject -->
<!-- Custom js for dashboard-->
<script src="{{asset('js/dashboard.js')}}"></script>
<!-- End custom js for dashboard-->



</body>

</html>
