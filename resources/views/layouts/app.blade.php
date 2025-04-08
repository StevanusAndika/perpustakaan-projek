<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Payment Portal Universitas IPWIJA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kemudahan membayar tagihan kuliah di Universitas IPWIJA dalam sekali klik."/>
    <meta name="author" content="Dhaffa Abdillah Hakim"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    {{-- Custom CSS --}}
    <link href="{{ asset('assets/custom/custom-style.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include Selecti2 CSS -->
    <link rel="stylesheet" href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet">

    <!-- Include Datatables CSS -->
    <link rel="stylesheet" href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet">

   <!-- include sweetalert2 -->
   <link rel="stylesheet"href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">

   <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
            integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

</head>

<!-- body start -->
<body data-menu-color="dark" data-sidebar="default">
    <!-- Begin page -->
    <div id="app-layout">
        @include('layouts.topbar')

        @include('layouts.sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>

    <!-- Vendor -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
    <!-- SweetAlert2 JS -->
    <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- jquery cdn-->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <!--select2 script-->
    <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>

    <!-- Include Datatables JS -->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <!-- App js-->
    <script src="{{ asset('assets/js/app.js')}}"></script>
    <script src="{{ asset('assets/js/logout-notif.js')}}"></script>

    <script src="{{asset('assets/libs/selectize/selectize.min.js')}}"></script>

   <script>
    @if(session('alert'))
    <script>
        Swal.fire({
            title: 'Access ditolak',
            text: "{{ session('alert') }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @yield('custom-script')

</body>
</html>