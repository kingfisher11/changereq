<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/img/company.png') }}" type="image/x-icon">
    <title>Sistem {{ $title ?? config('app.name') }} - Log Masuk</title>
    <link rel="icon" href="{{ asset('assets/img/ico.jpg') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <style>
        .topleft {
        position: absolute;
        top: 0px;
        left: 0px;
        font-size: 18px;
        
        }

        
    </style>
</head>

<body class="hold-transition login-page" style="background-image: url('{{ asset('material') }}/img/form-wizard-bg.jpg'); background-size: cover; background-position: top center; align-items: center;">

    
    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            let token = localStorage.getItem('token')
            let user  = localStorage.getItem('user')
            let isLogin  = localStorage.getItem('loggedIn')

            if(isLogin=='true'){
                location.href="{!! route('home') !!}"
            }
        })
    </script>
    <!-- Any Scripts -->
    @yield('scripts')
</body>
</html>