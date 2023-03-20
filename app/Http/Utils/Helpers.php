<?php

namespace App\Http\Utils;

class Helpers {

    public function CreateRandomPassword(){

        $caractersForCreatePassword = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-@.#*!';

        $password = substr( str_shuffle($caractersForCreatePassword), 0, 6 );

        return $password;
    }
}