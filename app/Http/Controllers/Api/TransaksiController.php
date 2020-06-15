<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResource;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index(){
        $data_transaksi= TransaksiResource::collection(Transaksi::all());
        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $data_transaksi   ,
            'massage' => 'Data Transaksi',
        ]);
    }
}
