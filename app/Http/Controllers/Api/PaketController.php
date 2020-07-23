<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaketResource;
use App\Http\Resources\TransaksiResource;
use App\Paket;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function invoice(Request $request)
    {
        $user = Auth::guard('api')->user();

        $t = new Transaksi();
        $t->user_id = $user->id;
        $t->paket_id = $request->paket_id;
        $t->nomor_invoice = '#' . rand(1000, 9999);
        $t->jumlah_peserta = $request->jumlah_peserta;
        $t->total_transaksi = $request->total_transaksi;
        $t->tanggal_liburan = date('Y-m-d', strtotime($request->tanggal_liburan));
        $t->harga_supir = preg_replace('/\D/', '', $request->harga_supir);
        $t->harga_tour_guide = preg_replace('/\D/', '', $request->harga_tour_guide);
        $t->harga = preg_replace('/\D/', '', $request->harga_paket);
        $t->save();

        if ($t) {
            return response()->json([
                'status' => true,
                'data' => $t,
                'message' => 'Invoice berhasil',
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => '',
            'message' => 'Invoice gagal',
        ]);
    }

    public function detailInvoice($id)
    {
        $user = Auth::guard('api')->user();
        $transaksi_data = Transaksi::where('id', $id)->where('user_id', $user->id)->first();

        $transaksi = new TransaksiResource($transaksi_data);

        return response()->json([
            'status' => true,
            'data' => $transaksi,
            'message' => 'detail transaksi!',
        ]);
    }
}
