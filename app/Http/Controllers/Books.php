<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Services\Books\BooksService;
use Illuminate\Http\Request;

class Books extends Controller
{
    private $bookService;

    public function __construct()
    {
        $this->bookService = new BooksService();
    }

    public function ListBooks(Request $request){
        $idUser = $request->user()->id;
        return $this->bookService->ListBooks($request->all(), $idUser);
    }

    public function CreateBook(CreateBookRequest $request){
        $idUser = $request->user()->id;
        return $this->bookService->CreateBook($request->all(), $idUser);
    }

    public function UpdateBook(UpdateBookRequest $request){
        $idUser = $request->user()->id;
        return $this->bookService->UpdateBook($request->all(), $idUser);
    }

    public function DeleteBook(DeleteBookRequest $request){
        $idUser = $request->user()->id;
        return $this->bookService->DeleteBook($request->all(), $idUser);
    }
}
