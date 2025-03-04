@extends('layouts/main')

@section('titulo_pagina','login de usuario')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card  mt-4">    
                    <div class="card-body">
                        <h2>login de usuario</h2>
                        <form action="{{route('logear')}}" method="post">
                            @csrf
                            @method('post')
                        <label for="usuario">usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario">
                        <label for="contraseña">contraseña</label>
                        <input type="contraseña"name="contraseña" id="contraseña" class="form-control">
                        <button class="btn btn-primary mt-4">entrar</button>
                        <a href="{{route('registro')}}" class="btn btn-info mt-4">Registrate aqui</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>