<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_buku',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_peminjam'
    ];
}
