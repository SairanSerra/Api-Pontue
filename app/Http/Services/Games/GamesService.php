<?php

namespace App\Http\Services\Games;

use App\Exceptions\CustomException;
use App\Http\Resources\ListGamesResource;
use App\Models\GamesModel;

class GamesService
{

    private $games;

    public function __construct()
    {
        $this->games = new GamesModel();
    }

    public function ListGames(array $request, string $idUser)
    {

        $listGames = $this->games->where('idUser', $idUser)->get();

        return ListGamesResource::collection($listGames);
    }
    public function UpdateGame(array $request, string $idUser)
    {

        $game = $this->games->where('idUser', $idUser)
                     ->where('id', $request['idGame'])->first();

        if (!$game) {
            throw new CustomException('Jogo não encontrado', 400);
        }

        //remove obj idGame for update game
        $request['idGame'] = null;


        $updateGame = $game->update($request);

        return response()->json([], 204);
    }

    public function CreateGame(array $request, string $idUser)
    {

        // add idUser in obj
        $request['idUser'] = $idUser;

        $createGame = $this->games->create($request);

        return response()->json([], 201);
    }

    public function DeleteGame(array $request, string $idUser)
    {

        $game = $this->games->where('idUser', $idUser)
                     ->where('id', $request['idGame'])->first();

        if (!$game) {
            throw new CustomException('Jogo não encontrado', 400);
        }

        $deleteGame = $game->delete();

        return response()->json(['message' => 'Jogo excluído com sucesso'],200);
    }
}
