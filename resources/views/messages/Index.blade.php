
@extends('layouts.app', ['activePage' => 'messages', 'titlePage' => __('Messages'),])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection