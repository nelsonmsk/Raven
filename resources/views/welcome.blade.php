 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'titlePage'=> 'Authhome','rtemplate' => $rtemplate])


@section('content')



  @auth
    <div class="container-fluid page-cover " id="home">
		<div class="cover">
				<div class="intro-text">
				</div>
				<div class="page-text">
						<p>Hie {{auth()->user()->name}} : Welcome to <span> </span></p>
						
				</div>
		</div>	
    </div>
  @else
    <section id="home" class="section-home">
        <div class="home">
		   <div class="hero-slider swiper">
			  <div class="swiper-wrapper">

				<div class="swiper-slide">
					<div class="hero-item item-bg-1">
						<div class="section-overlay"></div>
						<div class="row rw-align">
							<div class="col-md-12 col-lg-12 col-tl">
							  <h1 class="h1-large fs-md-5 fs-lg-6">Enjoy Delicious Meals &amp Exquisite Cuisines</h1>
							  <p class="p-large">Awesome food experience &amp great value at little cost </p>
							  <a class="btn btn-primary btn-solid-lg" href="#" role="button">Get Started</a>
							  <a class="btn btn-plain-lg" href="#" role="button">Book Now</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="swiper-slide">
					<div class="hero-item item-bg-2">
						<div class="section-overlay"></div>
						<div class="row rw-align">
							<div class="col-md-12 col-lg-12 col-tl">
							  <h1 class="h1-large fs-md-5 fs-lg-6"> Come &amp Experience Our Delicious Lunch Combos</h1>
							  <p class="p-large">Awesome food experience &amp great value at little cost </p>
							  <a class="btn btn-primary btn-solid-lg" href="#" role="button">Get Started</a>
							  <a class="btn btn-plain-lg" href="#" role="button">Book Now</a>
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="hero-item item-bg-3">
						<div class="section-overlay"></div>
						<div class="row rw-align">
							<div class="col-md-12 col-lg-12 col-tl">
							  <h1 class="h1-large fs-md-5 fs-lg-6">Make Your Meal A Special Moment With Our Dishes </h1>
							  <p class="p-large">Awesome food experience &amp great value at little cost </p>
							  <a class="btn btn-primary btn-solid-lg" href="#" role="button">Get Started</a>
							  <a class="btn btn-plain-lg" href="#" role="button">Book Now</a>
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="hero-item item-bg-4">
						<div class="section-overlay"></div>
						<div class="row rw-align">
							<div class="col-md-12 col-lg-12 col-tl">
							  <h1 class="h1-large fs-md-5 fs-lg-6"> Get Amazing World Class breakfast &amp Cofffee Deals </h1>
							  <p class="p-large">Awesome food experience &amp great value at little cost </p>
							  <a class="btn btn-primary btn-solid-lg" href="#" role="button">Get Started</a>
							  <a class="btn btn-plain-lg" href="#" role="button">Book Now</a>
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide">
					 <div class="hero-item item-bg-5">
					 	<div class="section-overlay"></div>
						<div class="row rw-align">
							<div class="col-md-12 col-lg-12 col-tl">
							  <h1 class="h1-large fs-md-5 fs-lg-6">Host Your Events At Our Restuarant</h1>
							  <p class="p-large">Awesome food experience &amp great value at little cost </p>
							  <a class="btn btn-primary btn-solid-lg" href="#" role="button">Get Started</a>
							  <a class="btn btn-plain-lg" href="#" role="button">Register</a>
							</div>
						</div>
					</div>
				</div>

			  </div>
			  <div class="swiper-pagination"></div>
			</div>
        </div> 
    </section>

      <!-- ============================================-->
	<section  id="reservation" class="pt-8 reservation bg-soft-primary">
		<div class="container">
			<div class="col-lg-12 col-md-12">
					<div class="banner-registration text-white wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
						<form id="registrationForm" class="registration-form" action="#" method="post">
							<p class="color-scheme center intro-title">
								Make Reservations
							</p>								
							<span class="col-sm-5 form-group">
								<input type="text" class="form-control" name="name" placeholder="Your Name" required="">
							</span>
							<span class="col-sm-4 form-group">
								<input type="email" class="form-control" name="email" placeholder="Your Email" required="">
							</span>
							<span class="col-sm-3 form-group">
								<input type="tel" class="form-control" name="phone" placeholder="Your Phone" required="">
							</span>
							<span class="col-sm-3 form-group">
								<input type="date" class="form-control" name="date" placeholder="Date" required="">
							</span>									
							<div class="col-sm-3 form-group">
								<input type="time" class="form-control" name="time" placeholder="Time" required="">
							</div>
							<div class="col-sm-3 form-group">
								<input type="text" class="form-control" name="number" placeholder="# of People" required="">
							</div>
							<p class="form-group">
							<button class="btn btn-primary btn-solid-lg " type="submit">Book  Now <span class="icon"><i class="fa fa-send"></i></span></button>
						</form>
					</div>
				
			</div>
		</div>
	</section>

      <!-- ============================================-->
	<section  id="about" class="pt-8 bg-soft-primary">  
	      <!-- Details 1 -->
			<div id="details" class="basic-0">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-xxl-5 text-center mx-auto">
						  <h2 class="h2-heading section-title">About Us <div class="header-strips-two"></div></h2>
						  <p class="mb-4">Get to know more about who we are.</p>
						</div>						
					</div>					
					<div class="row">
						<div class="col-lg-6 col-xl-5">
							<div class="text-container">
								<p>Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. Integer id quam id tellus hendrerit laciniad binfer
									Sed id dui rutrum, dictum urna eu, accumsan turpis. Fusce id auctor velit, sed viverra dui rem dina
								</p>
							</div> <!-- end of text-container -->
						</div> <!-- end of col -->
						<div class="col-lg-6 col-xl-7">
							<div class="image-container">
								<img class="img-fluid" src="images/features/f0.jpg" alt="alternative">
							</div> <!-- end of image-container -->
						</div> <!-- end of col -->						
					</div> <!-- end of row -->
				</div> <!-- end of container -->
			</div> <!-- end of basic-1 -->
	</section>
    <!-- end of details 1 -->
	

      <!-- ============================================-->
	<section id="section-details" class="pt-8 bg-soft-primary">  
	      <!-- Details 1 -->
			<div id="details" class="basic-2">
				<div class="container">				
					<div class="row details-bs">
						<div class="col-lg-6 col-xl-7">
							<div class="image-container">
								<img class="img-fluid" src="images/features/f6.jpg" alt="alternative">
							</div> <!-- end of image-container -->
						</div> <!-- end of col -->						
						<div class="col-lg-6 col-xl-5">
							<div class="text-container">
								<h2>Get Amazing, Quality Food Prepared From Best Ingredients </h2>
								<p>Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. Integer id quam id tellus hendrerit laciniad binfer
									Sed id dui rutrum, dictum urna eu, accumsan turpis. Fusce id auctor velit, sed viverra dui rem dina
								</p>
								<a class="btn btn-primary btn-fs" href="{{ config('app.url')}}/#reservation">Book Now</a>
							</div> <!-- end of text-container -->
						</div> <!-- end of col -->					
					</div> <!-- end of row -->
				</div> <!-- end of container -->
			</div> <!-- end of basic-1 -->
	</section>
    <!-- end of details 1 -->

      <!--Services Section begin ============================-->
      <section id="services" class="pt-8">
        <div class="container services">
            <div class="row">
				<div class="col-lg-6 col-xxl-5 text-center mx-auto">
				<h2 class="h2-heading section-title">Our Services  <div class="header-strips-two"></div></h2>
				<p class="mb-4">Get the best services at the price you can afford</p>
				</div>
            </div>
            <div class="row align-items-center">
                  <!-- ICON-BOX -->						
					<div class="col-sm-4">
						<div class="icon-box">
							<i class="fas fa-mug-hot"></i>
							<h3 class="title-sm text-theme-sm text-theme">Breakfast</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing Assure polite his really and others figure though. Day age advantages end sufficient eat expression travelling.</p>
						</div>
					</div>						
                  <!-- ICON-BOX -->
                  <div class="col-sm-4">
                     <div class="icon-box">
                        <i class="fas fa-hamburger"></i>
                        <h3 class="title-sm text-theme-sm text-theme">Lunch</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing Assure polite his really and others figure though. Day age advantages end sufficient eat expression travelling.</p>
                     </div>
                  </div>
                  <!-- ICON-BOX -->
                  <div class="col-sm-4">
                     <div class="icon-box">
                        <i class="fas fa-utensils"></i>
                        <h3 class="title-sm text-theme-sm text-theme">Dinner</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing Assure polite his really and others figure though. Day age advantages end sufficient eat expression travelling.</p>
                     </div>
                  </div>
                  <!-- ICON-BOX -->
            </div>
            <div class="row pad-sec-top-sm">
                  <!-- ICON-BOX -->
                  <div class="col-sm-4">
                     <div class="icon-box">
                        <i class="fas fa-music"></i>
                        <h3 class="title-sm text-theme-sm text-theme">Entertainment</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing Assure polite his really and others figure though. Day age advantages end sufficient eat expression travelling.</p>
                     </div>
                  </div>
                  <!-- ICON-BOX -->
                  <div class="col-sm-4">
                     <div class="icon-box">
                        <i class="fas fa-car"></i>
                        <h3 class="title-sm text-theme-sm text-theme">Valet Parking</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing Assure polite his really and others figure though. Day age advantages end sufficient eat expression travelling.</p>
                     </div>
                  </div>
                  <!-- ICON-BOX -->
                  <div class="col-sm-4">
                     <div class="icon-box">
                        <i class="fas fa-birthday-cake"></i>
                        <h3 class="title-sm text-theme-sm text-theme">Events Hosting</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing Assure polite his really and others figure though. Day age advantages end sufficient eat expression travelling.</p>
                     </div>
                  </div>
		    </div>
        </div>
      </section>
      <!--===== section close =========-->

	<!--===== Food Menu Section =====----> 
	<section id="our-menu" class="pt-8 food-menu-section">  
	      <!-- Details 1 -->
			<div id="details" class="food-menu basic-2">
				<div class="container">	
				<div class="row">
					<div class="col-lg-6 col-xxl-5 text-center mx-auto">
					  <h2 class="h2-heading section-title">Check Our Menu <div class="header-strips-two"></div></h2>
					</div>
				</div>				
					<div class="row food-menu-card">
						<div class="col-lg-6 col-sm-12">
							<h3 class="food-menu-type">Breakfast</h3>
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f1.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Baked Potatos &amp French Toast</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere pellentesque est							
									</p>
								</span>
								<p class="menu-item-price">$ 5.00</p>								
							</div>
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f2.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Grilled Sausages &amp Cheese Scones</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est	
									</p>
								</span>
								<p class="menu-item-price">$ 5.00</p>								
							</div>	
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f3.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Chocolate Muffins &amp Porched Eggs</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est
									</p>
								</span>
								<p class="menu-item-price">$ 5.00</p>								
							</div>								
						</div>						
						<div class="col-lg-6 col-sm-12">
							<h3 class="food-menu-type">Coffees</h3>						
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f6.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Hot Cappacino With Extra Millk</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est
									</p>
								</span>
								<p class="menu-item-price">$ 3.00</p>								
							</div>
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f6.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Black Brazillian Cofffee With No Sugar</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est. 
									</p>
								</span>
								<p class="menu-item-price">$ 4.50</p>								
							</div>	
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f6.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Expresso With Whipped Cream</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est
									</p>
								</span>
								<p class="menu-item-price">$ 4.50</p>								
							</div>								
						</div> 	
						<div class="col-lg-6 col-sm-12">
							<h3 class="food-menu-type">Lunch</h3>
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f1.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Baked Chicken Wing &amp Vanilla Custard</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. 							
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f2.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Baked Chicken Wing &amp Vanilla Custard</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. 	
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>	
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f3.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Baked Chicken Wing &amp Vanilla Custard</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis.
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>								
						</div>						
						<div class="col-lg-6 col-sm-12">
							<h3 class="food-menu-type">Dinner</h3>						
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f3.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Baked Chicken Wing &amp Vanilla Custard</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis.
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f5.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Baked Chicken Wing &amp Vanilla Custard</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. 
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>	
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f4.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Baked Chicken Wing &amp Vanilla Custard</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis.
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>								
						</div> 	
						<div class="col-lg-8 col-lg-offset-2 col-sm-12">
							<h3 class="food-menu-type">Drinks</h3>						
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f3.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Orange Juice Mix</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis.
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f5.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">PineApple & Gauva Jack's Sider</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. 
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>	
							<div class="food-menu-item">
								<span class="menu-image-container">
									<img class="img-circle menu-item-image" src="images/food-menu/f4.jpg" alt="alternative">
								</span> 
								<span class="menu-item-details">
									<h4 class="menu-item-name">Red Cocktail Poison Shots</h4>
									<p class="menu-item-description">Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis.
									</p>
								</span>
								<p class="menu-item-price">$ 10.00</p>								
							</div>								
						</div> 							
					</div> 
				</div> 
			</div> 
	</section>
	<!-- food menu close --->

    <!-- Projects -->
	<section class="pt-8 bg-soft-primary" id="specials"> 
		<div id="specials" class="filter bg-gray specials">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-xxl-5 text-center mx-auto">
					  <h2 class="h2-heading section-title">Check Our Specials <div class="header-strips-two"></div></h2>
					</div>
				</div>					
				<div class="row">
				  <div class="col-lg-12 d-flex justify-content-center">
					<div class="button-group filters-button-group">
						<button class="button is-checked" data-filter="*">All</button>
						<button class="button" data-filter=".coffees">Coffees</button>						
						<button class="button" data-filter=".breakfast">Breakfast</button>
						<button class="button" data-filter=".lunch">Lunch</button>
						<button class="button" data-filter=".dinner">Dinner</button>
						<button class="button" data-filter=".drinks">Drinks</button>						
					</div> <!-- end of button group -->
				  </div>
				</div>
							
				<div class="grid specials-container">		
					<div class="col-lg-4 col-md-6 specials-item lunch">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f1.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>App 1</h4>
							<p>App</p>
							<div class="specials-links">
							  <a href="{{ asset('images/specials/f1.jpg') }}" data-gallery="specialsGallery" class="specials-lightbox" title="Lunch"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 specials-item breakfast drinks">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f2.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>Web 3</h4>
							<p>Web</p>
							<div class="specials-links">
							  <a href="img/specials/f2.jpg" data-gallery="specialsGallery" class="specials-lightbox" title="br"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 specials-item lunch coffees">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f3.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>App 2</h4>
							<p>App</p>
							<div class="specials-links">
							  <a href="{{ asset('images/specials/f3.jpg') }}" data-gallery="specialsGallery" class="specials-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 specials-item dinner coffees">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f4.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>Card 2</h4>
							<p>Card</p>
							<div class="specials-links">
							  <a href="{{ asset('images/specials/f4.jpg') }}" data-gallery="specialsGallery" class="specials-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 specials-item breakfast coffees">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f5.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>Web 2</h4>
							<p>Web</p>
							<div class="specials-links">
							  <a href="{{ asset('images/specials/f5.jpg') }}" data-gallery="specialsGallery" class="specials-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 specials-item lunch drinks">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f6.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>App 3</h4>
							<p>App</p>
							<div class="specials-links">
							  <a href="{{ asset('images/specials/f6.jpg') }}" data-gallery="specialsGallery" class="specials-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 specials-item dinner">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f7.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>Card 1</h4>
							<p>Card</p>
							<div class="specials-links">
							  <a href="{{ asset('images/specials/f7.jpg') }}" data-gallery="specialsGallery" class="specials-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 specials-item filter-card">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f8.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>Card 3</h4>
							<p>Card</p>
							<div class="specials-links">
							  <a href="{{ asset('images/specials/f8.jpg') }}" data-gallery="specialsGallery" class="specials-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 specials-item breakfast">
						<div class="specials-wrap">
						  <img src="{{ asset('images/specials/f9.jpg') }}" class="img-fluid" alt="">
						  <div class="specials-info">
							<h4>Web 3</h4>
							<p>Web</p>
							<div class="specials-links">
							  <a href="{{ asset('images/specials/f9.jpg') }}" data-gallery="specialsGallery" class="specials-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
							  <a href="{{ config('app.url') }}/specials/1" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						  </div>
						</div>
					</div>
				</div>
			</div> 
		</div>
    <!-- end of projects -->
	</section>



      <!-- ==============Details section==============================-->
	<section id="section-details" class="pt-8 bg-soft-primary">  
	      <!-- Details 1 -->
			<div id="details" class="basic-1">
				<div class="container">				
					<div class="row details-bs">
						<div class="col-lg-6 col-xl-5">
							<div class="text-container">
								<h2>Come &amp Celebrate Your Special Moments In Our Restuarant  </h2>
								<p>Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. Integer id quam id tellus hendrerit laciniad binfer
									Sed id dui rutrum, dictum urna eu, accumsan turpis. Fusce id auctor velit, sed viverra dui rem dina
								</p>
								<a class="btn btn-default btn-fs" href="{{ config('app.url')}}/#contact">Get In Touch</a>
							</div> <!-- end of text-container -->
						</div> <!-- end of col -->
						<div class="col-lg-6 col-xl-7">
							<div class="image-container">
								<img class="img-fluid" src="images/features/f4.jpg" alt="alternative">
							</div> <!-- end of image-container -->
						</div> <!-- end of col -->						
					</div> <!-- end of row -->
				</div> <!-- end of container -->
			</div> <!-- end of basic-1 -->
	</section>
    <!-- end of details 1 -->


		<!-- teams start here--> 
		<div class="section pt-6" id="profiles">
            <div class="container profiles">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-xs-12">
                        <div class="section-header text-center">
                            <h2 class="h2-heading section-title">{{ __('Meet The Team') }}<div class="header-strips-two"></div></h2>
                            <p class="section-subtext">Our dedicated and passionate team members</p>
                        </div>
                    </div>
                </div>				
				<div class="team-cover">
				@if($rtemplate['profiles']->count() != 0)				
					@foreach($rtemplate['profiles'] as $pf)
						<div class="col-lg-3 col-sm-6 ">
							<div class="prof wow fadeInUp" data-wow-delay="1.5s">
								@if($rtemplate['profilesImages']->count() != 0)
									@foreach($rtemplate['profilesImages'] as $pi)
										@if($pi->ref_id == $pf->id)
											<img src="{{ asset('storage/'.$pi->imagePath)}}"> 
										@endif
									@endforeach
								@else
									<img src="{{ asset('images/team/team-4.jpg')}}" alt="Team" class="img-fluid avatar-cover">
								@endif					
								
								<div class="social">
									<a href=""><i class="fas fa-twitter"></i></a>
									<a href=""><i class="fas fa-facebook"></i></a>
									<a href=""><i class="fas fa-instagram"></i></a>
									<a href=""><i class="fas fa-linkedin"></i></a>
								</div>				
								<hgroup class="hgroup-text">
									<h3><strong>{{$pf->name}}</strong></h3>
									<em>{{$pf->title}}</em>
									<p class="profile-txt">{{$pf->bio}} </p>
								</hgroup>
							</div>
						</div>
					@endforeach	
				@else
						<div class="col-lg-3 col-sm-6 ">
							<div class="prof wow fadeInUp" data-wow-delay="1.5s">
								<img src="images/team/team-1.jpg" alt="Team" class="img-fluid avatar-cover">
								<div class="social">
									<a href=""><i class="fa fa-twitter"></i></a>
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-linkedin"></i></a>
								</div>				
								<hgroup class="hgroup-text">
									<h3><strong>Chef. Harvey Monahan</strong></h3>
									<em>CEO / Founder</em>
									<p class="profile-txt">Dolore esse reprehenderit occaecati et molestiae autem. Nisi sed rerum dicta ut qui accusamus iste. Sed sit amet aperiam est laborum ullam. </p>
								</hgroup>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 ">
							<div class="prof wow fadeInUp" data-wow-delay="1.5s">
								<img src="images/team/team-2.jpg" alt="Team" class="img-fluid avatar-cover">
								<div class="social">
									<a href=""><i class="fa fa-twitter"></i></a>
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-linkedin"></i></a>
								</div>				
								<hgroup class="hgroup-text">
									<h3><strong>Liana Green</strong></h3>
									<em>Head Chef </em>
									<p class="profile-txt">Sed sit amet aperiam est laborum ullam. Dolore esse reprehenderit occaecati et molestiae autem. Nisi sed rerum dicta ut qui accusamus iste. </p>
								</hgroup>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 ">
							<div class="prof wow fadeInUp" data-wow-delay="1.5s">
								<img src="images/team/team-3.jpg" alt="Team" class="img-fluid avatar-cover">
								<div class="social">
									<a href=""><i class="fa fa-twitter"></i></a>
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-linkedin"></i></a>
								</div>				
								<hgroup class="hgroup-text">
									<h3><strong>Destiny Hoppen</strong></h3>
									<em>Kitchen Manager</em>
									<p class="profile-txt"> Nisi sed rerum dicta ut qui accusamus iste. Dolore esse reprehenderit occaecati et molestiae autem. Sed sit amet aperiam est laborum ullam. </p>
								</hgroup>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 ">
							<div class="prof wow fadeInUp" data-wow-delay="1.5s">
								<img src="images/team/team-4.jpg" alt="Team" class="img-fluid avatar-cover">
								<div class="social">
									<a href=""><i class="fa fa-twitter"></i></a>
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-linkedin"></i></a>
								</div>				
								<hgroup class="hgroup-text">
									<h3><strong>George Adams</strong></h3>
									<em>Procurement Expert</em>
									<p class="profile-txt"> Reprehenderit occaecati et molestiae autem dolore esse. Sed sit amet aperiam est laborum ullam. Nisi sed rerum dicta ut qui accusamus iste.</p>
								</hgroup>
							</div>
						</div>				
				@endif
				</div>
			</div>
		</div>
		<!--teams end here-->


	<!--=== Step-1 section Starts ===-->
	<section id="step-1" class="section-step step-wrap">
	   <!--Client logo-->
	   <div id="carousel-our-gallery" class="owl-carousel text-center margin-top-20">
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g1.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g2.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g3.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g4.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g5.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g6.jpeg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g7.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g8.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g9.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g10.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g11.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/g12.jpg" class="img-responsive" alt="" /> </a> </div>		  	  
	   </div>
	   <!--/Client logo--> 
	</section>
	<!--=== Step-1 section Ends ===-->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="pt-6 testimonials">
      <div class="container animated" data-animation="bounceInLeft" data-animation-delay="700">
        <div class="row">
            <div class="col-lg-6 col-xxl-5 text-center mx-auto">
              <h2 class="h2-heading section-title">Valued Clients Testimonials  <div class="header-strips-two"></div></h2>
              <p class="mb-4">What they're saying about us</p>
            </div>
        </div>
        <div class="testimonials-slider swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('images/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('images/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('images/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('images/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('images/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
	
	
	<section id="contact" class="pt-6 contact">
			<!-- Contact -->
			<div id="contact" class="form-1">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="h2-heading section-title"><span>Get In Touch With Us</span><div class="header-strips-two"></div></h2>
							<p class="p-heading">Vel malesuada sapien condimentum nec. Fusce interdum nec urna et finibus pulvinar tortor id</p>
							<ul class="list-unstyled li-u6">
								<li><i class="fa fa-map-marker"></i> &nbsp;22 Praesentum, Pharetra Fin, CB 12345, KL</li>
								<li><i class="fa fa-phone"></i> &nbsp;<a href="tel:00817202212">+81 720 2212</a></li>
								<li><i class="fa fa-envelope"></i> &nbsp;<a href="mailto:lorem@ipsum.com">lorem@ipsum.com</a></li>
							</ul>
						</div> <!-- end of col -->
					</div> <!-- end of row -->
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							
							<!-- Contact Form -->
							<form>
								<div class="form-group">
									<input type="text" class="form-control-input" placeholder="Name" required>
								</div>
								<div class="form-group">
									<input type="email" class="form-control-input" placeholder="Email" required>
								</div>
								<div class="form-group">
									<select class="form-control-select" required>
										<option class="select-option" value="" disabled selected>Service type</option>
										<option class="select-option" value="breakfast">Breakfast</option>
										<option class="select-option" value="lunch">Lunch</option>
										<option class="select-option" value="dinner">Dinner</option>
										<option class="select-option" value="drinks">Drinks</option>	
										<option class="select-option" value="entertainment">Entertainment</option>
										<option class="select-option" value="parking">Valet Parking</option>
										<option class="select-option" value="events">Events Hosting</option>										
									</select>
								</div>
								<div class="form-group">
									<textarea class="form-control-textarea" placeholder="Message" required></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control-submit-button">Submit</button>
								</div>
							</form>
							<!-- end of contact form -->

						</div> <!-- end of col -->
					</div> <!-- end of row -->
				</div> <!-- end of container -->
			</div> <!-- end of form-1 -->
			<!-- end of contact -->
	</section>
      <!-- ============================================-->
	  

  @endauth
  
@endsection
 