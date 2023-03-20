<?php
$segments = request()->segments();
$last = end($segments);
$second = count($segments) > 2 ? $segments[count($segments) - 2] : '';
$third = count($segments) > 3 ? $segments[count($segments) - 3] : '';
$url = url()->current();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" template />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/template/dist/css/adminlte.min.css') }} ">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DATATABLE -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- SELECT 2 -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }} ">
    <!-- TOASTR -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/toastr/toastr.min.css') }} ">
    <!-- EDITOR -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/summernote/summernote-bs4.css') }} ">
    <link rel="stylesheet" href="{{ asset('/template/plugins/summernote/summernote-bs4.css') }}">
    <script src="{{ asset('/template/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/html-duration-picker@latest/dist/html-duration-picker.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/style.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                @csrf
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('/template/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ strtoupper(Auth::user()->user_type)}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('/template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ strtoupper(Auth::user()->user_type)}}

                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{route('admin.getProfile')}}" class="btn btn-default btn-flat">Profile</a>
                            <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('/template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ strtoupper(Auth::user()->user_type)}}</a>
                    </div>
                </div>
                @if (Session::has('flash-success'))
                <p class="admin-toastr" onclick="toastr_success('{{ session('flash-success')}}')"></p>
                @endif
                @if (Session::has('flash-error'))
                <p class="admin-toastr" onclick="toastr_danger('{{ session('flash-error')}}')"></p>
                @endif
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item ">
                            <a href="{{route('admin.dashboard')}}" class="nav-link @if ($url== route('admin.dashboard') ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview  @if ($url== route('classes.list') || $url== route('classes.add') ||$second=='edit-classes' ||$url== route('exam.list') || $url== route('exam.add') ||$second=='edit-exam'||$url== route('board.list') || $url== route('board.add') ||$second=='edit-board' ||$url== route('subjects.list')  || $url== route('subjects.add') || $second=='edit-subjects'||$second=='chapters'||$second=='edit-chapters'|| $third=='section' || $second=='edit-section' || $second=='edit-lesson' || $third=='concept' || $second=='edit-concept') menu-open active @endif">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-users"></i>
                                <p>
                                    Course Panel
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (Auth::guard('admin')->check())

                                <li class="nav-item">
                                    <a href="{{route('board.list')}}" class="nav-link @if ($url== route('board.list') || $url== route('board.add') ||$second=='edit-board' ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Boards
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('exam.list')}}" class="nav-link  @if ($url== route('exam.list') || $url== route('exam.add') ||$second=='edit-exam' ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Exams
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('classes.list')}}" class="nav-link   @if ($url== route('classes.list') || $url== route('classes.add') ||$second=='edit-classes' ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Classes
                                        </p>
                                    </a>
                                </li>
                                @endif



                                <li class="nav-item">
                                    <a href="{{route('subjects.list')}}" class="nav-link  @if ($url== route('subjects.list')  || $url== route('subjects.add') || $second=='edit-subjects'||$second=='chapters'||$second=='edit-chapters'|| $third=='section' || $second=='edit-section' || $second=='edit-lesson' || $third=='concept' || $second=='edit-concept'  ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Subjects
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @if (Auth::guard('admin')->check()||Auth::guard('school')->check())
                        <!-- <li class="nav-item ">
                            <a href="{{route('classes.list')}}" class="nav-link @if ($url== route('classes.list') || $url== route('classes.add') ||$second=='edit-classes' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Classes
                                </p>
                            </a>
                        </li>


                        <li class="nav-item ">
                            <a href="{{route('subjects.list')}}" class="nav-link @if ($url== route('subjects.list')  || $url== route('subjects.add') || $second=='edit-subjects'||$second=='chapters'||$second=='edit-chapters'|| $third=='section' || $second=='edit-section' || $second=='edit-lesson' || $third=='concept' || $second=='edit-concept'  ) active @endif">
                                <i class=" nav-icon fas fa-users"></i>
                                <p>
                                    Subjects
                                </p>
                            </a>
                        </li> -->
                        @endif

                        @if (Auth::guard('school')->check())
                        <li class="nav-item ">
                            <a href="{{route('teacher.list')}}" class="nav-link @if ($url== route('teacher.list') || $url== route('teacher.add') ||$second=='edit-teacher' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Teachers
                                </p>
                            </a>
                        </li>


                        <li class="nav-item ">
                            <a href="{{route('student.list')}}" class="nav-link @if ($url== route('student.list') || $url== route('student.add') ||$second=='edit-student' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Students
                                </p>
                            </a>
                        </li>
                        @endif
                        @if (Auth::guard('instructor')->check())
                    
                        <li class="nav-item ">
                            <a href="{{route('student.list')}}" class="nav-link @if ($url== route('student.list') || $url== route('student.add') ||$second=='edit-student' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Students
                                </p>
                            </a>
                        </li>
                        @endif
                        @if (Auth::guard('admin')->check())

                        <!-- <li class="nav-item ">
                            <a href="{{route('board.list')}}" class="nav-link @if ($url== route('board.list') || $url== route('board.add') ||$second=='edit-board' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Board
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item ">
                            <a href="{{route('tutor.list')}}" class="nav-link @if ($url== route('tutor.list') || $url== route('tutor.add') ||$second=='edit-tutor' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Tutors
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('school.list')}}" class="nav-link @if ($url== route('school.list') || $url== route('school.add') ||$second=='edit-school' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Schools
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item ">
                            <a href="{{route('exam.list')}}" class="nav-link @if ($url== route('exam.list') || $url== route('exam.add') ||$second=='edit-exam' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Exams
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item has-treeview  @if ($url== route('student.freelancer') || $url== route('student.school') ||$second=='edit-classes' ||$url== route('exam.list') || $url== route('exam.add') ||$second=='edit-exam'||$url== route('board.list') || $url== route('board.add') ||$second=='edit-board' ||$url== route('subjects.list')  || $url== route('subjects.add') || $second=='edit-subjects'||$second=='chapters'||$second=='edit-chapters'|| $third=='section' || $second=='edit-section' || $second=='edit-lesson' || $third=='concept' || $second=='edit-concept') menu-open active @endif">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-users"></i>
                                <p>
                                    Students
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                               
                                <li class="nav-item">
                                    <a href="{{route('student.freelancer')}}" class="nav-link  @if ($url== route('student.freelancer')  || $url== route('student.add') || $second=='edit-student'||$second=='chapters'||$second=='edit-chapters'|| $third=='section' || $second=='edit-section' || $second=='edit-lesson' || $third=='concept' || $second=='edit-concept'  ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Freelancer Student
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('student.school')}}" class="nav-link  @if ($url== route('student.school')  || $url== route('student.add') || $second=='edit-student'||$second=='chapters'||$second=='edit-chapters'|| $third=='section' || $second=='edit-section' || $second=='edit-lesson' || $third=='concept' || $second=='edit-concept'  ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            School Student
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('pages')}}" class="nav-link @if ($url==route('pages') || $url==route('logo.edit') || $url==route('banner.edit') || $url==route('loginpage.edit') ) active @endif">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Pages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('exercise-icon.list')}}" class="nav-link @if ($url==route('exercise-icon.list')|| $second =='icon-edit' ) active @endif">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Quick Icon
                                </p>
                            </a>
                        </li>
                        @endif


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="{{route('admin.dashboard')}}">SARASVATI</a>.</strong>
            All rights reserved.
        </footer>

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>

</html>
<!-- jQuery -->
<script type="text/javascript">
    var base_url = "<?php echo url('') . '/'; ?>"
    var csrf_token = "{{csrf_token()}}"
</script>
<script src="{{ asset('/template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/template/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<script src="{{ asset('/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('/template/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('/template/dist/js/demo.js') }}"></script>
<script src="{{ asset('/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('/template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/template/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('/template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('/template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/template/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/template/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('/admin-assets/js/adminjs.js') }}"></script>