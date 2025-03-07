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
                        <h2>Formulario de Contacto</h2>
                        <form action="{{route('enviar-fiscal')}}" method="post">
                            @csrf
                            @method('post')

                            <label for="contacto">Contacto</label>
                            <input type="text" class="form-control" name="contacto" id="contacto">

                            <label for="correo">Correo (opcional)</label>
                            <input type="email" class="form-control" name="correo" id="correo">

                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" name="celular" id="celular">

                            <label for="mensaje">Mensaje</label>
                            <textarea class="form-control" name="mensaje" id="mensaje"></textarea>

                            <button class="btn btn-primary mt-4">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
