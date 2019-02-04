<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('assets/themes/company-profile/img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('assets/themes/company-profile/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap css -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link href="{{ asset('assets/themes/company-profile/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('assets/themes/company-profile/lib/owlcarousel/assets/themes/company-profile/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/company-profile/lib/owlcarousel/assets/themes/company-profile/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/company-profile/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/company-profile/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/company-profile/lib/modal-video/css/modal-video.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('assets/themes/company-profile/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/themes/company-profile/lib/alertifyjs/css/alertify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/themes/company-profile/lib/alertifyjs/css/themes/bootstrap.min.css') }}" rel="stylesheet">
  </head>
<body>

  @include('public.partials._top_menu')
  @yield('content')

  <a
    href="javascript:void(0)"
    class="back-to-top">
      <i class="fa fa-chevron-up"></i>
  </a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('assets/themes/company-profile/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/themes/company-profile/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('assets/themes/company-profile/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/themes/company-profile/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('assets/themes/company-profile/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('assets/themes/company-profile/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/themes/company-profile/lib/modal-video/js/modal-video.js') }}"></script>
  <script src="{{ asset('assets/themes/company-profile/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/themes/company-profile/lib/wow/wow.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('assets/themes/company-profile/contactform/contactform.js') }}"></script>
  <!-- Template Main Javascript File -->
  <script src="{{ asset('assets/themes/company-profile/js/main.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/themes/company-profile/lib/alertifyjs/js/alertify.min.js') }}"></script>
  <script type="text/javascript">
    /*
    *
    * < =========== NOTIFY FUNCTION =========== >
    */
    function notify(param)
    {
      return alertify.message(param);
    }
    /*
    *
    * < =========== SERIALIZE FUNCTION =========== >
    */
    function serializer(e,id) {
      e.preventDefault();
      return jQuery(id).serialize();
    }
    /*
    *
    * < =========== GET TOKEN FUNCTION FROM META TAG =========== >
    */
    function _token()
    {
      return { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') };
    }
  </script>
  @yield('scripts')
</body>
</html>
