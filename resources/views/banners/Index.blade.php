
@extends('layouts.app', ['activePage' => 'banners', 'titlePage' => __('Banners')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection