
<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="env" content="{{ config('app.url') }}">
    <title>{{ config('app.name') }}</title>

    <!-- Styles  -->
	<!--=== Google Fonts ===-->
	<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:600,400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	
	<!--=== Off-canvas-sidebar plugins Files ===-->		
	<link href="{{ asset('css/parsley.css') }}" rel="stylesheet"> 	
	<link href="{{ asset('css/flaticon.css') }}" rel="stylesheet"/>	
	<link href="{{ asset('css/fancy-buttons.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/jquery.vegas.css') }}" rel="stylesheet" />	
	<link href="{{ asset('css/baraja.css') }}" rel="stylesheet"/>
    <link href="{{ asset('plugins/linericon/style.css') }}" rel="stylesheet">	
    <link href="{{ asset('plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet"/>
    <link href="{{ asset('plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet" />	
	<link href="{{ asset('plugins/boxicons/css/boxicons.min.css') }}" rel="stylesheet">		
	<link href="{{ asset('plugins/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/swiper/swiper-bundle.min.css') }}" rel="stylesheet">	
	<link href="{{ asset('plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet"/>	
	
	<!--=== Main Stylesheets ===-->	
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">	
	<link href="{{ asset('material/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet"> 
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>
	
</head>


<body class="{{ $class ?? '' }}">
	<!--=== Preloader section starts ===-->
	<section id="preloader">
		<div class="loading-circle fa-spin"></div>
	</section>
	<!--=== Preloader section Ends ===-->
	@if (Route::has('login'))
       @auth   
	   		   	<form id="logoutForm" action="logout" method="POST" style="display: none;">
				{{csrf_token()}}
			   </form> 
			  @include('layouts.page_templates.auth')   
	   @else
			   @include('layouts.page_templates.guest')
		@endauth
    @endif
	
	
 <!--==== main-panel scripts ====-->
        <script src="{{ asset('material/js/core/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>		
		<script src="{{ asset('js/main.js') }}"></script>
	    
		<script src="{{ asset('js/parsley.min.js') }}"></script>
      <!--   Core JS Files   -->
       <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
     <!--   <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script> -->
       <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
       <!-- Plugin for the momentJs  -->
       <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
       <!--  Plugin for Sweet Alert -->
      <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
       <!-- Forms Validations Plugin -->
       <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
       <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
      <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
       <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
      <!-- <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script> -->
      <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
       <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
	  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
      <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
      <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
       <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
      <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
       <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
     <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
      <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
      <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
     <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
      <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
      <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
     <!-- Library for adding dinamically elements -->
      <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
      <!--  Google Maps Plugin    -->
     <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script>
      <!-- Chartist JS -->
      <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
       <!--  Notifications Plugin    -->
      <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script> 
      <!-- Control Center for Dashboard: parallax effects, scripts for the example pages etc -->
       <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>

	<!-- main Scripts -->	
	<script src="{{ asset('js/main.js') }}"></script>

 <!--==== off-canvas-sidebar scripts ====-->  
   <!--==== Essential files ====-->
	<script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/sweetalert2.js') }}"></script>
	<!--==== Slider and Card style plugin ====-->
	<script type="text/javascript" src="{{ asset('js/jquery.baraja.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('js/jquery.vegas.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
	<!--==== MailChimp Widget plugin ====-->
	<script type="text/javascript" src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
	<!--==== Scroll and navigation plugins ====-->
	<script type="text/javascript" src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.nav.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
	<!-- Waypoint and Counters--> 
	<script type="text/javascript" src="{{ asset('plugins/counter/waypoints.min.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('plugins/counter/jquery.counterup.min.js') }}"></script>
	<!-- Purecounter counter for statistics numbers -->	
	<script type="text/javascript" src="{{ asset('plugins/counter/purecounter.min.js') }}"></script> 
	<!-- Owl Carousel--> 
	<script type="text/javascript" src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('plugins/swiper/swiper-bundle.min.js') }}"></script> <!-- Swiper for image and text sliders -->
	<script src="{{ asset('plugins/isotope-layout/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('plugins') }}/dropzone/dist/dropzone-min.js"></script> 	
	
	<!--==== Custom Script files ====-->
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	 
	 @stack('js')  

</body>

</html>
