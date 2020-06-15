<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;

class HotelController extends Controller
{
    public function index(){
        $data_hotel= HotelResource::collection(Hotel::all());
        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $data_hotel,
            'massage' => 'Data Hotel',
        ]);
    }
}
