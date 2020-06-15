<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WisatawanResource;
use App\Wisatawan;

class WisatawanController extends Controller
{
    public function index(){
    $data_wisatawan=WisatawanResource::collection(Wisatawan::all());
    return response()->json([
        'error' =>[],
        'status'=> true,
        'data'=>$data_wisatawan,
        'massage'=> 'Data Wisatawan'
    ]);
    }
}
