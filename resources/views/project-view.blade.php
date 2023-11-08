@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'portfolio','titlePage' => __('specialsView'),$rtemplate])

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container dark-bg">
        <h2>Special Items Details</h2>
      </div>
    </section>
	<!-- End Breadcrumbs -->
	<!-- ======= Specials Details Section ======= -->
	<section id="specials-details" class="specials-details">
		<div class="container">
			<div class="row gy-4">
			@if($rtemplate['projects']->count() != 0)
				@foreach($rtemplate['projects'] as $pj)			
				<div class="col-lg-8">
					<div class="specials-details-slider swiper">
					    <div class="swiper-wrapper">
							<div class="swiper-slide">							
								@if($rtemplate['projectsImages']->count() != 0)
									@foreach($rtemplate['projectsImages'] as $pi)
										@if($pi->ref_id == $pj->id)
											<img src="{{ asset('storage/'.$pi->imagePath)}}" class="img-fluid"/> 
										@endif
									@endforeach
							    @else
								  <img src="{{ asset('images/specials/f6.jpg')}}"  class="img-fluid" alt=""/>									
								@endif
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>							
				<div class="col-lg-4">
					<div class="specials-info">
					  <h3>{{$pj->type}}</h3>
					  <ul>
						<li><strong>Name</strong>: {{$pj->name}}</li>
						<li><strong>Status</strong>: {{$pj->status}}</li>
						<li><strong>Start Date</strong>: {{$pj->sdate}}</li>
						<li><strong>End Date</strong>: {{$pj->edate}}</li>										
					  </ul>
					</div>
					<div class="specials-description">
					  <h2>Description</h2>
					  <p>
						{{$pj->description}}		
					  </p>
					</div>
				</div>
				<div class="col-lg-12 ft-2">
					<a href="{{config('app.url')}}/#specials" class="btn-lg btn-blue back-button">Back to Portfolio</a>
				</div>
				@endforeach
			@else
				<div class="col-lg-8">
					<div class="specials-details-slider swiper">
					    <div class="swiper-wrapper">
							<div class="swiper-slide">
							  <img src="{{ asset('images/specials/f2.jpg')}}" class="img-fluid" alt="">
							</div>
							<div class="swiper-slide">
							  <img src="{{ asset('images/specials/f3.jpg')}}" class="img-fluid" alt="">
							</div>
							<div class="swiper-slide">
							  <img src="{{ asset('images/specials/f4.jpg')}}" class="img-fluid" alt="">
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>							
				<div class="col-lg-4">
					<div class="specials-info">
					  <h3>Special Item Information</h3>
					  <ul>
						<li><strong>Type</strong>: Web Applications</li>
						<li><strong>Client</strong>: Haven Prints LLC</li>						
						<li><strong>Status</strong>: Complete</li>
						<li><strong>Start Date</strong>: 12 Jan 2019</li>
						<li><strong>End Date</strong>: 28 Nov 2019</li>	
						<li><strong>Url Link</strong>: <a href="#">www.specials.com</a></li>							
					  </ul>
					</div>
					<div class="specials-description">
					  <h2>Description</h2>
					  <p>
						Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. 
					  </p>
					</div>
				</div>
				<div class="col-lg-12 ft-2">
					<a href="{{config('app.url')}}/#specials" class="btn-solid-lg btn-blue back-button">Back to Specials List</a>
				</div>				
			@endif
			</div>
		</div>
	</section>
<!-- End Portfolio Details Section --> 
@endsection 