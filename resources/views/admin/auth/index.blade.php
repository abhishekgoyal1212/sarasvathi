
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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/template/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/admin-assets/css/style.css') }}">
    <!-- Google Font: Source Sans Pro -->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- TOASTR -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/toastr/toastr.min.css') }} ?>">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="hold-transition login-page">

    @if(Session::has('flash-success'))
    <script>
        swal("Success", "{{session('flash - success ')}}", "success");
    </script>
    @elseif(Session::has('flash-error'))
    <script>
        swal("Error", "{{session('flash-error')}}", "error");
    </script>
    @endif

    @yield('content')
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('/template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->

    <script src="{{ asset('/template/plugins/toastr/toastr.min.js') }} "></script>

    <script src="{{ asset('/template/dist/js/adminlte.min.js') }}"></script>

</body>

</html>
<!-- 
<script type="text/javascript">
    $(document).ready(function() {
        $(".admin-toastr").click();
    });

    function toastr_danger(msg) {
        toastr.error(msg)
    }

    function toastr_success(msg) {
        toastr.success(msg)
    }
</script> -->