<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MobilResource;
use App\Mobil;

class MobilController extends Controller
{
    public function index(){
        $data_mobil= MobilResource::collection(Mobil::all());
        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $data_mobil,
            'massage' => 'Data Mobil',
        ]);
    }
}
