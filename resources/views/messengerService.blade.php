@extends('layouts.app')
@section('title', 'NECESITO ASESORIA - Cliente')
@section('content')
    <div id="app">
        <inbox-screen :user="{{ auth()->user() }}"></inbox-screen>
    </div>
 @endsection