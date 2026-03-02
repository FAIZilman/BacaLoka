<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_peminjam extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPeminjamFactory> */
    use HasFactory;
    protected $fillable = ['peminjam_id', 'buku_id', 'jumlah'];
}