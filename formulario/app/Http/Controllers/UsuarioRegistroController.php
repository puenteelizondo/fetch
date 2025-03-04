<?php

namespace App\Http\Controllers;

use App\Models\UsuarioRegistro;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class UsuarioRegistroController extends Controller
{

    public function createusuario(Request $request) // Método dentro de la clase
    {   //post
        try{
        $request->validate([
            'usuario' => 'required|string|max:15|unique:usuarios,usuario',
            'contraseña' => 'required|string|max:20'
        ]);

        // Crear el producto
        $product = UsuarioRegistro::create([
            'usuario' => $request->usuario,
            'contraseña' => $request->contraseña,
        ]);

         // Respuesta exitosa
         return response()->json([
            'message' => 'Mensaje enviado correctamente',
            'product' => $product
        ], Response::HTTP_CREATED); // 201 CREATED

    } catch (ValidationException $e) {
        Log::warning("Error de validación: " . json_encode($e->errors()));
        return response()->json([
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], Response::HTTP_BAD_REQUEST); // 400 BAD REQUEST

    } catch (\Exception $e) {
        Log::error("Error inesperado: " . $e->getMessage());
        return response()->json([
            'message' => 'Error inesperado. Por favor, inténtelo de nuevo más tarde.'
        ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 INTERNAL SERVER ERROR
    }

   

   } 

}
