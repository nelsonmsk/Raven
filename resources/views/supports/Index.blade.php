
@extends('layouts.app', ['activePage' => 'supports', 'titlePage' => __('Supports')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection