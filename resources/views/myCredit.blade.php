@extends('layouts.app')
@section('title', 'NECESITO ASESORIA - Cliente')
@section('content')
    <div id="app">
        <my-credit-screen :user="{{ auth()->user() }}"><my-credit-screen>
    </div>
@endsection