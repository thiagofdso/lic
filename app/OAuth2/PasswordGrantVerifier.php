<?php
namespace CodeDelivery\OAuth2;
/**
 * Created by PhpStorm.
 * User: Thiago
 * Date: 11/07/2016
 * Time: 17:57
 */
use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}