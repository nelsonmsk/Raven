
@extends('layouts.app', ['activePage' => 'notifications', 'titlePage' => __('Notifications')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection