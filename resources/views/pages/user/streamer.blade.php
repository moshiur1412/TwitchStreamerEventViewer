@extends('layouts.app')

@section('template_title')
{{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

<div class="container">
	@include('panels.streamer-panel')
</div>

@endsection

@section('footer_scripts')
@endsection
