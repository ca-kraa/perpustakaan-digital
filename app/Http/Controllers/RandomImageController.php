<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RandomImageController extends Controller
{
    public function getSchoolPhotos()
    {
        // $client_id = env('UNSPLASH_ACCESS_KEY');
        try {
            $response = Http::get("https://api.unsplash.com/photos/random?query=school&client_id=" . env('UNSPLASH_ACCESS_KEY'));
            $data = $response->json();

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
