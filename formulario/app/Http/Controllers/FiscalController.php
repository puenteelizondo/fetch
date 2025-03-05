<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Fiscal;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class FiscalController extends Controller
{

    public function fiscal(Request $request)
    {
        try {
            // Validar los datos de entrada
            $request->validate([
                'contacto' => 'required|string|max:100',
                'correo' => 'nullable|email|max:50',
                'celular' =>['required', 'regex:/^\+?[0-9]{10,15}$/'],
                'mensaje' => 'required|string|max:1000',
                'ip' => 'nullable|string|ip|max:250',
                'navegador' => 'nullable|string|max:250',

            ],[
                'celular' => 'Por favor de ingresar un numero de telefono valido',
            ]);

            // Crear el registro en la base de datos
            $procurador = Fiscal::create([
                'contacto' => $request->contacto,
                'correo' => $request->correo,
                'celular' => $request->celular,
                'mensaje' => $request->mensaje,
                'f_mensaje' => now(),
                'ip' => $request->ip(),
                'navegador' => $request->header('User-Agent'),
            ]);

            // Respuesta exitosa
            return view("modules/dashboard/Mostrar_Fiscal");

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

    public function obtenerRegistros()
{
    try {
        // Obtener todos los registros de la tabla 'procurador' de la base de datos
        $registros = Fiscal::all();

        // Respuesta exitosa con los registros
        return response()->json([
            'data' => $registros
        ], Response::HTTP_OK); // 200 OK

    } catch (\Exception $e) {
        // En caso de un error inesperado
        Log::error("Error inesperado al obtener los registros: " . $e->getMessage());
        return response()->json([
            'message' => 'Error inesperado. Por favor, inténtelo de nuevo más tarde.'
        ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 INTERNAL SERVER ERROR
    }
}





}
