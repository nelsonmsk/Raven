
@extends('layouts.app', ['activePage' => 'profiles', 'titlePage' => __('User Profile')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection