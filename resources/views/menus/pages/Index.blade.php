
@extends('layouts.app', ['activePage' => 'menus', 'titlePage' => __('Menus')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection