<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'tanggal_pinjam', 'tanggal_kembali', 'status'];
}