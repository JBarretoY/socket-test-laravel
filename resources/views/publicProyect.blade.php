@extends('layouts.app')
@section('title', 'NECESITO ASESORIA - Cliente')
@section('content')
	<div id="app">
		<project-screen :user="{{ auth()->user() }}" :countries="{{ $countries }}" :categories="{{ $categories }}" />
	</div>
@endsection