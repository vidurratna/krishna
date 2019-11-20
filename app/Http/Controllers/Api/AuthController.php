<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $password = $request['password'];
        $request['password'] = bcrypt($request['password']);

        User::create($request->all());

        $http = new Client;

        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'wzSHQWguWWscHZ7hIop3YI2iowXsDzZLOuFYtq90',
                'username' => $request->email,
                'password' => $password,
                'scope' => '',
            ],
        ]);
    
        return response(['data' => json_decode((string) $response->getBody(), true)]);
         
    }
}
