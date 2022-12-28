<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" href="{{ asset('assets/img/ico.jpg') }}">
    <!-- jQuery-ui -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui/jquery-ui.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-checkboxes/css/dataTables.checkboxes.css') }}">
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <!-- Tree View -->
    <link href="/css/treeview.css" rel="stylesheet"> 
    <!-- Any Styles -->
    @yield('styles')
    <style>
    .navbar
    {
        border-bottom:3px solid #fb04a3;
    }

    .pointer {
    cursor: pointer;
}

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #39984c;
    color: #fff;
    margin: 0;
    padding: 0;
    width: 200px;
    position: fixed;
    height: 100%;
    overflow: auto;
    }

    .container 
    {
        justify-content: center;
    }

    @media only screen and (max-width: 480px) {
    .responsive {
        width: 80%;
    }
    }

    @media only screen and (max-width: 480px) {
    .respCard {
        width: 50%;
        padding-bottom: 10px;
    }
    }


    </style>
</head>
<body class="hold-transition text-sm">

        <!-- Begin Page Content -->

        @include('layouts.page_templates.guest')


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery-ui -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- Moment -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<!-- Datetimepicker -->
<script src="{{ asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script> 
<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
 <!-- Tree View -->
<script src="/js/treeview.js"></script>

<script>
    $(function() {
    //--- Sweet Alert Toaster public function ---
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        
        @if ($message = Session::get('success'))
            // Toast.fire({
            //     icon: 'success',
            //     title: '{{ $message }}'
            // })
            Swal.fire({
                title: 'Success!',
                text: '{{ $message }}',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
        @elseif($message = Session::get('error'))
            // Toast.fire({
            //     icon: 'error',
            //     title: '{{ $message }}'
            // })
            Swal.fire({
                title: 'Error!',
                text: '{{ $message }}',
                icon: 'error',
                timer: 3000,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            }).then(function() {
                // location.reload();
            });
        @endif


        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    //---End sweet alert toaster ---
        
    //--- Datatable public function ---
        $("#datatable1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, columnDefs:[{"searchable": false, "targets": 0}],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable1_wrapper .col-md-6:eq(0)');
        
        $('#datatable2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false, 
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('#datatable3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $("#datatable4").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "searching": false, 
            "autoWidth": false, 
            columnDefs:[{"searchable": false, "targets": 0}],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable4_wrapper .col-md-6:eq(0)');
    //--- End datatable ---

    });

</script>
<!-- Any Scripts -->
@yield('scripts')
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
</body>
</html>


