<?php

namespace App\Http\Services\Games;

use App\Exceptions\CustomException;
use App\Http\Resources\ListGamesResource;
use App\Models\GamesModel;

class GamesService
{

    private $modelGames;

    public function __construct()
    {
        $this->modelGames = new GamesModel();
    }

    public function ListGames(array $request, string $idUser)
    {

        $listGames = $this->modelGames->where('idUser', $idUser)->get();

        return ListGamesResource::collection($listGames);
    }
    public function UpdateGame(array $request, string $idUser)
    {

        $game = $this->modelGames->where('idUser', $idUser)
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

        $createGame = $this->modelGames->create($request);

        return response()->json([], 201);
    }

    public function DeleteGame(array $request, string $idUser)
    {

        $game = $this->modelGames->where('idUser', $idUser)
                     ->where('id', $request['idGame'])->first();

        if (!$game) {
            throw new CustomException('Jogo não encontrado', 400);
        }

        $deleteGame = $game->delete();

        return response()->json(['message' => 'Jogo excluído com sucesso'],200);
    }
}
