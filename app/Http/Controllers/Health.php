<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class Health extends Controller
{
    public function VerifyHealthAPI(){

        $dataResponse = [
            'status' => 'RUNING',
            'version' => app()->version(),
            'date'  => Carbon::now()->format('d/m/Y')
        ];

        return response()->json($dataResponse, 200);
    }
}
