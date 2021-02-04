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
                return [
                    'data' => $userData->api_token,
                    'status' => 200
                    ];
            }
        }
        catch (\Exception $e) {
            return [
                    'data' => "Error en validacion de datos".$e,
                    'status' => 404
            ];
        }
    }
}
