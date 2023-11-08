
@extends('layouts.app', ['activePage' => 'projects', 'titlePage' => __('Projects')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection