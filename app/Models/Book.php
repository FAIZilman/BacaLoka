<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $fillable = ['image', 'kategori_id', 'title', 'slug', 'desc', 'author', 'penerbit', 'year_terbit', 'book_file'];
}