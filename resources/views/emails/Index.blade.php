
@extends('layouts.app', ['activePage' => 'emails', 'titlePage' => __('Emails')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection