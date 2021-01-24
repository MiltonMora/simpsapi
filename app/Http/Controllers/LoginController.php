<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login($email, $password) {
        try {
            $userData = User::where('email', $email)->first();
            if (Hash::check($password, $userData->password)) {
                return $userData->api_token;
            }
        }
        catch (\Exception $e) {
            return response()->json([
                    'data' => "Error en validacion de datos".$e,
                    'status' => 404
                ]);
        }
    }
}
