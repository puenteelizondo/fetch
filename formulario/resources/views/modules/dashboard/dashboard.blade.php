@extends('layouts/main')

@section('titulo_pagina','Formulario de contacto')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <pre>
                    @if(isset($session))
                        <p>Usuario: {{ $session['usuario'] }}</p>
                        @else
                            <p>No hay usuario en la sesión.</p>
                        @endif
                    </pre>
                <div class="card-body">
                    <ul>
                        <li>ENVIAR FISCAL <a href="{{route('enviar-fiscal')}}">#</a></li>
                        <li>MOSTRAR FISCAL <a href="{{route('mostrar-fiscal')}}">#</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection