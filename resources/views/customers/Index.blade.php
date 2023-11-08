
@extends('layouts.app', ['activePage' => 'customers', 'titlePage' => __('Customers')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection