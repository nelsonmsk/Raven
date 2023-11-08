
@extends('layouts.app', ['activePage' => 'newsletters', 'titlePage' => __('Newsletters'),])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection