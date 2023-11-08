
@extends('layouts.app', ['activePage' => 'testimonials', 'titlePage' => __('Testimonials')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection