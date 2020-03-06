@extends('layouts.app')
@section('title', 'Registro de pago con Paypal')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h3 class="text-center">Deposito de pago para el proyecto (SIMULACION)</h3>
                <form method="POST" action="{{ url('paypal') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="amount">Monto</label>
                        <input type="text" class="form-control" name="amount" id="amount">
                    </div>
                    <button type="submit" class="btn btn-primary">Depositar</button>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
@endsection
@section('js')
@endsection
