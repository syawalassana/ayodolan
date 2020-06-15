<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ObjekWisata;
use App\Http\Resources\ObjekWisataResource;

class ObjekWisataController extends Controller
{
   public function index(){
    $objekwisata = ObjekWisataResource::collection(ObjekWisata::all());
    return response()->json([
        'error' => [],
        'status' => true,
        'data' => $objekwisata,
        'massage' => 'data wisata',
    ]);
   }
  
}
