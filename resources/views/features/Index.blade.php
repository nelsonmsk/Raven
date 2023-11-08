
@extends('layouts.app', ['activePage' => 'features', 'titlePage' => __('Features')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection