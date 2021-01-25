<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function create(string $name, string $email, string $password)
    {
        try {
            $user = new User();
            $user->name = ucwords($name);
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->api_token = bin2hex(openssl_random_pseudo_bytes(15));
            $user->save();

            return response()->json([
                'message'=> 'user created successfully',
                'status' => 200
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'message'=> $e,
                'status' => 404
            ]);
        }
    }

}
