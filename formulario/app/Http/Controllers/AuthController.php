<?php


namespace App\Http\Controllers;

use App\Models\UsuarioRegistro;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //crear un index
    public function index(){
        //traemos la vista 
        return view("modules/auth/login");
    }

    public function registro(){
        return view("modules/auth/registro");
    }


    public function registrar(Request $request) // Método dentro de la clase
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


   public function logear(Request $request) {
    try {
        // Validar entrada
        $request->validate([
            'usuario' => 'required|string|max:15',
            'contraseña' => 'required|string|max:20'
        ]);

        // Buscar usuario en la base de datos
        $usuario = UsuarioRegistro::where('usuario', $request->usuario)->first();

        // Verificar si el usuario existe y la contraseña coincide
        if (!$usuario || $usuario->contraseña !== $request->contraseña) {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], Response::HTTP_UNAUTHORIZED); // 401 UNAUTHORIZED
        }

        // Respuesta exitosa
        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'usuario' => $usuario->usuario
        ], Response::HTTP_OK); // 200 OK

    } catch (\Exception $e) {
        Log::error("Error en el login: " . $e->getMessage());
        return response()->json([
            'message' => 'Error inesperado. Intente nuevamente.'
        ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 INTERNAL SERVER ERROR
    }
    

    }

    public function home(){

        return view('modules/dashboard/home');
    }
   }
    




