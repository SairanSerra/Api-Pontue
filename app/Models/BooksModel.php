<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BooksModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "books";

    protected $fillable = [
        'idUser',
        'name',
        'nbPages',
        'dtRelease',
        'favorite'
    ];
}
