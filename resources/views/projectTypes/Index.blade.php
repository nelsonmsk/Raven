
@extends('layouts.app', ['activePage' => 'projectTypes', 'titlePage' => __('ProjectTypes')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection