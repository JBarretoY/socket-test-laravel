@extends('layouts.app')
@section('title', 'LISTADO DE PROYECTOS - Consultor')
@section('content')
	<div id="app">
		<projects-screen :user="{{ auth()->user() }}" />
	</div>
@endsection