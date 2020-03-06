@extends('layouts.app')

@section('title', 'NECESITO ASESORIA - Cliente')
@section('content')

<div id="app">
    <workspace-screen :user="{{ auth()->user() }}" :project="{{ $project }}" :chat="{{ $chat }}"></workspace-screen>
</div>

@endsection