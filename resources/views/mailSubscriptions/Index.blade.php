
@extends('layouts.app', ['activePage' => 'mailSubscriptions', 'titlePage' => __('Subscriptions')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection