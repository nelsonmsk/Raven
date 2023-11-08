
@extends('layouts.app', ['activePage' => 'reports', 'titlePage' => __('Reports'),])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection