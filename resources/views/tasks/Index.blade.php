
@extends('layouts.app', ['activePage' => 'tasks', 'titlePage' => __('Tasks')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection