<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoribuku_relasi extends Model
{
    use HasFactory;
    protected $fillable = ['id_buku', 'id_kategori'];
}
