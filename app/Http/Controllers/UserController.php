<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    /**
     * @param $name string
     * @param $email string
     * @param $password string
     * @return array
     */
    public function create($name, $email, $password)
    {
        try {
            $user = new User();
            $user->name = ucwords($name);
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->api_token = bin2hex(openssl_random_pseudo_bytes(15));
            $user->save();

            return [
                'message'=> 'user created successfully',
                'status' => 200
            ];
        }
        catch (\Exception $e) {
            [
                'message'=> $e,
                'status' => 404
            ];
        }
    }

}
