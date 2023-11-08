
@extends('layouts.app', ['activePage' => 'bookings', 'titlePage' => __('Bookings'),])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection