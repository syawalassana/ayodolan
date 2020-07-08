<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaketResource;
use App\Paket;

class PaketController extends Controller
{
    public function index()
    {
        $paket = PaketResource::collection(Paket::paginate());

        return response()->json([
            'status' => true,
            'data' => $paket,
            'massage' => 'data paket',
        ]);
    }

    public function detail($id)
    {
        $paket = new PaketResource(Paket::find($id));

        return response()->json([
            'status' => true,
            'data' => $paket,
            'massage' => 'detail paket',
        ]);
    }
}
