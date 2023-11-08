
@extends('layouts.app', ['activePage' => 'galleryImages', 'titlePage' => __('Images Gallery')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection