
@extends('layouts.app', ['activePage' => 'services', 'titlePage' => __('Services')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection