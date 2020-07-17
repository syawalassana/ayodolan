<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MakananResource;
class MakananController extends Controller
{
   public function index(){
    $data_makanan = MakananResource::colection(Makanan::all());
    return response()->json([
        'error' => [],
        'status' => true,
        'data' => $data_makanan,
        'massage' => 'Data Makanan Khas Pacitan',
    ]);
   }
}
