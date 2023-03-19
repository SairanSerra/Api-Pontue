<?php

namespace App\Http\Services\User;

use App\Exceptions\CustomException;
use App\Http\Resources\LoginResource;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserService
{

    private $user;

    public function __construct()
    {

        $this->user = new UserModel();
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

        $removeAllToken = $informationsUser->tokens()->delete();

        $tokenUser = $informationsUser->createToken($request['deviceName'])->plainTextToken;

        return (new LoginResource($informationsUser))->additional(['token' => $tokenUser]);
    }

    public function SignUP(array $request){

        $verifyEmailExists = $this->user->where('email', $request['email'])->first();

        $passwordIsLike = $request['password'] === $request['confirmPassword'];

        // password different or email exist
        if(!$passwordIsLike || $verifyEmailExists){

            $message = $verifyEmailExists ? 'Email já cadastrado'
                        : 'Senhas divergentes';

            throw new CustomException($message, 400);
        }

        //transform password in hash
        $request['password'] = bcrypt($request['password']);

        $this->user->create($request);

        return response()->json([],201);
    }

}
