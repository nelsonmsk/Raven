
@extends('layouts.app', ['activePage' => 'hires', 'titlePage' => __('Hires'),])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection