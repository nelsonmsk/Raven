
@extends('layouts.app', ['activePage' => 'mailPosts', 'titlePage' => __('MailPosts')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection