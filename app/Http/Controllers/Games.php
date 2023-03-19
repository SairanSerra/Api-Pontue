<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameRequest;
use App\Http\Requests\DeleteGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Services\Games\GamesService;
use Illuminate\Http\Request;

class Games extends Controller
{
    private $gameService;

    public function __construct()
    {
        $this->gameService = new GamesService();

    }
    public function ListGames(Request $request){
        $idUser = $request->user()->id;
        return $this->gameService->ListGames($request->all(), $idUser);
    }

    public function UpdateGame(UpdateGameRequest $request){
        $idUser = $request->user()->id;
        return $this->gameService->UpdateGame($request->all(), $idUser);
    }

    public function CreateGame(CreateGameRequest $request){
        $idUser = $request->user()->id;
        return $this->gameService->CreateGame($request->all(), $idUser);
    }

    public function DeleteGame(DeleteGameRequest $request){
        $idUser = $request->user()->id;
        return $this->gameService->DeleteGame($request->all(), $idUser);
    }
}
