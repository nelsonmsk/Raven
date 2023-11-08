
@extends('layouts.app', ['activePage' => 'appDefaults', 'titlePage' => __('App Defaults')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection