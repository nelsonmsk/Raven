
@extends('layouts.app', ['activePage' => 'home', 'titlePage' => __('Home Page')])

@section('content')
  
<div class=" content">
<div class="container-fluid">
  
	<div class="row cover">
			<div class="intro-text">
			</div>
			<div class="page-text">
					<p>Hie {{auth()->user()->name}} : Welcome to <span> </span></p>
					
			</div>
	</div>	
</div>
</div>

 
@endsection