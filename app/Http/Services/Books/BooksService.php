<?php

namespace App\Http\Services\Books;

use App\Exceptions\CustomException;
use App\Http\Resources\ListBooksResource;
use App\Models\BooksModel;

class BooksService {

    private $modelBooks;

    public function __construct()
    {
        $this->modelBooks = new BooksModel();
    }

    public function ListBooks(array $request, string $idUser)
    {

        $listGames = $this->modelBooks->where('idUser', $idUser)->get();

        return ListBooksResource::collection($listGames);
    }
    public function UpdateBook(array $request, string $idUser)
    {

        $book = $this->modelBooks->where('idUser', $idUser)
                     ->where('id', $request['idBook'])->first();

        if (!$book) {
            throw new CustomException('Livro não encontrado', 400);
        }

        //remove obj idBook for update game
        $request['idBook'] = null;


        $updateGame = $book->update($request);

        return response()->json([], 204);
    }

    public function CreateBook(array $request, string $idUser)
    {

        // add idUser in obj
        $request['idUser'] = $idUser;

        $createGame = $this->modelBooks->create($request);

        return response()->json([], 201);
    }

    public function DeleteBook(array $request, string $idUser)
    {

        $book = $this->modelBooks->where('idUser', $idUser)
                     ->where('id', $request['idBook'])->first();

        if (!$book) {
            throw new CustomException('Livro não encontrado', 400);
        }

        $deleteBook = $book->delete();

        return response()->json(['message' => 'Livro excluído com sucesso'],200);
    }
}