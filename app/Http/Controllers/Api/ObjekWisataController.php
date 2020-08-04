<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ObjekWisata;
use App\Http\Resources\ObjekWisataResource;

class ObjekWisataController extends Controller
{
    public function index(Request $request)
    {
        $objek = ObjekWisata::query();

        if ($request->search) {
            $s = $request->search;
            $objek->where(function ($q) use ($s) {
                $q->where('nama_wisata', 'like', '%' . $s . '%')
                    ->orWhere('deskripsi', 'like', '%' . $s . '%')
                    ->orWhere('tipe_wisata', $s);
            });
        }

        $objek = $objek->get();

        $objekwisata = ObjekWisataResource::collection($objek);

        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $objekwisata,
            'massage' => 'data wisata',
        ]);
    }
}
