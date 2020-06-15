<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaketResource;
use App\Paket;

class PaketController extends Controller
{
    public function index(){
        $paket = PaketResource::collection(Paket::all());
        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $paket,
            'massage' => 'data wisata',
        ]);
       }    
}
