<?php

namespace App\Services\User;

use App\Exceptions\CustomException;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    private $user;

    public function __construct()
    {

        $this->user = new User();
    }

    public function Login(array $request)
    {

        $informationsUser = $this->user->where('email', $request['email'])->first();

        if (!$informationsUser) {
            throw new  CustomException('Usuário não encontrado', 401);
        }

        $checkPassword = Hash::check($request['password'], $informationsUser->password);

        if (!$checkPassword) {
            throw new  CustomException('Email/Senha incorreto', 401);
        }

        $tokenUser = $informationsUser->createToken($request['deviceName'])->plainTextToken;

        return (new LoginResource($informationsUser))->additional(['token' => $tokenUser]);
    }

    public function SignUP(array $request){

        //transform password in hash
        $request['password'] = bcrypt($request['password']);

        $this->user->create($request);
    }
}
