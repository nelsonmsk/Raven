{{-- \resources\views\errors\404.blade.php --}}

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
	<link href="css/animate.css" rel="stylesheet"/>
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">	
	
	<!--=== Main Stylesheets ===-->	
    <link href="css/app.css" rel="stylesheet"> 
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">	
	<link href="skydash/css/vertical-layout-light/style.css" rel="stylesheet"> 
	<link href="css/responsive.css" rel="stylesheet"/>
	
</head>


<body class="off-canvas-sidebar">
	<!--=== Preloader section starts ===
	<section id="preloader">
		<div class="loading-circle fa-spin"></div>
	</section>	-->
		<div class="content errorPage">
            <div class="container-fluid two-cols-description-row">
               <div class="two-cols-description-row">
					<div class="two-cols-description-text wow fadeInRight" data-wow-duration="1.5s">								  
						<div class="two-cols-description-text-inner">
							<div class="heading">
							   <h1 class="bold-font">{{ __('404') }}</h1>
							   <h2 class="light-font subheading">{{__('Sorry, the page you are looking for could not be found!! ')}}</h2>
							</div></p>
							<a class="btn btn-plain-lg " href="{{ config('app.url') }}">{{__('Go Home')}}</a>
						</div>
					</div>
                    <div class="two-cols-description-image wow fadeInLeft" data-wow-delay="0.50s">
                        <img src="images/error-404.png"  alt="" />
                    </div>	
				</div>
		  </div>
		</div>

 <!--==== main-panel scripts ====-->
        <script src="skydash/vendors/js/vendor.bundle.base.js"></script>
		<script src="js/bootstrap.min.js"></script>		 

	 
	 @stack('js')  

</body>




