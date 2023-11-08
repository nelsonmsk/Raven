@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'gallery','titlePage' => __('Gallery'),$rtemplate])

@section('content')

		<div class="container-fluid login-cover">
		
				<h2 class="section-title"><sdivong>{{ __('Our Gallery') }}</sdivong></h2>
					<div class="row gallery-cover">
					
						@foreach($rtemplate['gallery'] as $gy)
							<div class="col-lg-3 col-md-4 col-sm-6 ">
								<!-- <img src="storage/{{$gy->imagePath}}" alt="Team" class="img-circle avatar-cover">-->
								<a href="" class="gallery-link"><img src="img/people.jpg" alt="{{$gy->name}}" class="img-round gallery-item" id="{{$gy->pageId}}"></a>
							</div>
						@endforeach
						 <div class="col-lg-12 col-md-12 col-sm-10 ">
							<span> {{ $rtemplate['gallery']->links() }}</span>
							<span  class="currentPage"> Current Page:{{ $rtemplate['gallery']->currentPage()}}</span>
						</div>
					</div >
		</div>
	
@endsection