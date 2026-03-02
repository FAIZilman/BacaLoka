<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    /** @use HasFactory<\Database\Factories\DendaFactory> */
    use HasFactory;
    protected $fillable = ['peminjam_id', 'jumlah_denda', 'status'];
}