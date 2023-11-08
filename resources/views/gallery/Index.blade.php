
@extends('layouts.app', ['activePage' => 'galleries', 'titlePage' => __('Galleries')])


@section('contents')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection