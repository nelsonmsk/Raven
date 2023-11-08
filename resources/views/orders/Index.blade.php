
@extends('layouts.app', ['activePage' => 'orders', 'titlePage' => __('Orders')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection