
@extends('layouts.app', ['activePage' => 'plans', 'titlePage' => __('Plans'),])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection