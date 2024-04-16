<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ getBaseURL() }}">
	<meta name="file-base-url" content="{{ getFileBaseURL() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/images/favicon-32x32.png') }}" type="image/png"/>
	<!--plugins-->
	<link href="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('backend/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	{{-- <link href="{{ asset('backend/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/> --}}
	<!-- loader-->
	<link href="{{ asset('backend/css/pace.min.css') }}" rel="stylesheet"/>

	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/bootstrap-extended.css') }}" rel="stylesheet">
	{{-- <link href="../../../../fonts.googleapis.com/css276c7.css?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet"> --}}
	<link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('backend/css/dark-theme.css') }}"/>
	<link rel="stylesheet" href="{{ asset('backend/css/semi-dark.css') }}"/>
	<link rel="stylesheet" href="{{ asset('backend/css/header-colors.css') }}"/>
    <link rel="stylesheet" href="{{ asset('backend/plugins/notifications/css/lobibox.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('img_css/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('img_css/css/aiz-core.css') }}">

    <script src="{{ asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('img_css/js/vendors.js') }}"></script>
    <script src="{{ asset('img_css/js/aiz-core.js') }}"></script>
    <script src="{{ asset('backend/js/pace.min.js') }}"></script>

    <script>
        var AIZ = AIZ || {};
    </script>
	<title>Cargo Admin | Dashboard</title>
    @livewireStyles


</head>

<body>

    <!--wrapper-->
    @if (auth()->guard('admin')->check() && request()->route()->getName() != 'login')
        <div class="wrapper">
            @include('components.backend.layouts.nav')
            @include('components.backend.layouts.sidebar')
             {{ $slot }}
            @include('components.backend.layouts.footer')
        </div>


        <!--end wrapper-->
    @else
        <div class="wrapper">
            {{ $slot }}
        </div>
    @endif

    <!-- Bootstrap JS -->

    <!--plugins-->
     <!-- ./wrapper -->
	<script src="{{ asset('backend/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->


	<script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js')}}"></script>
	{{-- <script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js')}}"></script> --}}
	<script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>

	<script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{ asset('backend/plugins/chartjs/js/chart.js')}}"></script>

	<!--app JS-->
	<script src="{{ asset('backend/js/app.js')}}"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
    <link href="{{ asset('backend/css/dropzone.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/js/dropzone.min.js')}}"></script>
    <script src="{{ asset('backend/plugins/notifications/js/lobibox.min.js')}}"></script>
    <script src="{{ asset('backend/plugins/notifications/js/notifications.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script data-navigate-once></script>

    @foreach (['error', 'warning', 'success', 'info'] as $msg)
     @if (Session::has($msg))
         <script>

             $(function() {
                 var Toast = Swal.mixin({
                     toast: true,
                     position: 'top-end',
                     showConfirmButton: false,
                     timer: 3000
                 });

                 Toast.fire({
                     icon: "{{ $msg }}",
                     title: "{{ Session::get($msg) }}",
                     showCloseButton: true,
                 });
             });
         </script>
     @endif
     @endforeach

    @livewireScripts

    @stack('scripts')
    <script>
        function validateNumber(input) {
            // Remove non-numeric characters using a regular expression
            let numericValue = input.value.replace(/[^0-9]/g, '');

            // Convert the numeric value to a number (if needed)
            numericValue = parseFloat(numericValue); // or use parseInt() if you want an integer

            // Return the numeric value
            return numericValue;
        }
      </script>
</body>

</html>
