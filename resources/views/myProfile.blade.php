@extends('layouts.app')
@section('title', 'Profile - Consultaneo')
@section('content')
<div id="app">
    <profile-screen
        :user="{{ auth()->user() }}"
        :done-projects="{{ $countProyectFi }}"
        :categories="{{ $categories }}"
        :countries="{{ $countries }}"
        :languages="{{ $languages }}" />
</div>
@endsection
