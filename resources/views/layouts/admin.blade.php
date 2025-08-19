<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF TOKEN -->
    <meta name = "csrf-token" content="{{ csrf_token() }}">


    <title>KaporerDokan-Admin</title>
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr@3.5.1/dist/themes/classic.min.css">
    <style>
        .form-control{
            border: 1px solid #ddd;
        }
    </style>
    @livewireStyles

</head>
<body>
    
    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')

        <div class ="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>


        </div>
    </div>







    <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr@3.5.1/dist/pickr.min.js"></script>
    <!-- End custom js for this page-->

    
    @livewireScripts
    @stack('script')
    
    
</body>
</html>