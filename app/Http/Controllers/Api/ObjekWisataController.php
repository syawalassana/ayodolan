<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ObjekWisata;

class ObjekWisataController extends Controller
{
    public function index(){
        return response()->json([
            'error' => [],
            'status' => true,
            'data' => ObjekWisata::all(),
            'massage' => 'Data Objek Wisata'    

        ]
    );
    }
}
