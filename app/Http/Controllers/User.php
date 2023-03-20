<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SignUPRequest;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;

class User extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function Login(LoginRequest $request){
        return $this->userService->Login($request->all());
    }

    public function SignUP(SignUPRequest $request){
        return $this->userService->SignUP($request->all());
    }

    public function ResetPassword(ResetPasswordRequest $request){
        return $this->userService->ResetPassword($request->all());
    }
    public function ChangePassword(ChangePasswordRequest $request){
        return $this->userService->ChangePassword($request->all());
    }
}
