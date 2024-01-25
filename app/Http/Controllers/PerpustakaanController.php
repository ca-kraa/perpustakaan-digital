<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\kategoribuku;
use App\Models\kategoribuku_relasi;
use App\Models\koleksi_pribadi;
use App\Models\peminjam;
use App\Models\ulasanbuku;
use App\Models\User;
use Illuminate\Support\Facades\Response;


class PerpustakaanController extends Controller
{
    public function bukuIndex()
    {
        $data = buku::all();
        return response()->json($data);
    }

    public function Petugasindex()
    {
        $petugas = User::where('level', 'petugas')->get();

        if ($petugas->count() > 0) {
            $petugas->makeHidden(['bearer_token', 'level', 'id', 'created_at', 'updated_at', 'email_verified_at']);

            return response()->json([
                'data' => $petugas,
                'message' => 'Data petugas berhasil diambil.'
            ]);
        } else {
            return response()->json([
                'message' => 'Data petugas tidak ditemukan.'
            ], 404);
        }
    }

    public function jumlahUser()
    {
        $jumlahuser = User::count();
        return response()->json($jumlahuser);
    }
}
