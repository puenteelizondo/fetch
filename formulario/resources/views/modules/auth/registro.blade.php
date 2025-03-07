@extends('layouts/main')
@section('titulo_pagina', 'Registro de usuario')

@section('contenido')
<div class="container">
        <div class="row">
            <div class="col">
                <div class="card  mt-4">    
                    <div class="card-body">
                        <h2>Registro de usuario</h2>
                        <form action="{{route('/registrar-usuario')}}" method="post">
                        @csrf
                        @method('POST')
                        <label for="usuario">usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario">
                        <label for="contraseña">contraseña</label>
                        <input type="contraseña"name="contraseña" id="contraseña" class="form-control">
                        <button class="btn btn-primary mt-4">Registrarse</button>
                        <a href="{{route('login')}}" class="btn btn-info mt-4">Login</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection