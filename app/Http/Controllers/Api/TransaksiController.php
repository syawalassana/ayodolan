<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\TransaksiResource;
use App\Transaksi;
use App\TransaksiPeserta;
use App\User;
use App\Paket;
use Illuminate\Support\Facades\DB;

class TransaksiController
{
    public function index()
    {
        $data_transaksi = TransaksiResource::collection(Transaksi::all());

        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $data_transaksi,
            'massage' => 'Data Transaksi',
        ]);
    }
    public function buat_transaksi(Request $request)
    {
        try {
            DB::beginTransaction();

            $paket = Paket::find($request->input('paket_id'));
            $user = User::find($request->input('user_id'));

            $nomor_invoice = uniqid();

            $totalharga_peserta = $paket->harga * $request->input('jumlah_peserta');
            $totalharga_liburan = $totalharga_peserta + $paket->harga_supir + $paket->harga_tour_guide;
            $totalfinal = $totalharga_liburan * 1.2;

            $total_transaksi = $totalfinal;

            $data_transaksi = new Transaksi;
            $data_transaksi->nomor_invoice = $nomor_invoice;
            $data_transaksi->user_id = $user->name;
            $data_transaksi->paket_id = $paket->nama_paket;
            $data_transaksi->jumlah_peserta = $request->input('jumlah_peserta');
            $data_transaksi->tanggal_liburan = $request->input('tanggal_liburan');
            $data_transaksi->total_transaksi = $total_transaksi;
            $data_transaksi->harga_supir = $paket->harga_supir;
            $data_transaksi->harga_tour_guide = $paket->harga_tour_guide;
            $data_transaksi->harga = $paket->harga;
            $data_transaksi->save();

            if ($data_transaksi) {
                for ($i = 1; $i <= $request->input('jumlah_peserta'); $i++) {
                    $transaksi_peserta = new TransaksiPeserta;
                    $transaksi_peserta->transaksi_id = $data_transaksi->id;
                    $transaksi_peserta->nama = $request->input($i . '_nama');
                    $transaksi_peserta->gender = $request->input($i . '_gender');
                    $transaksi_peserta->no_telepon = $request->input($i . '_no_telepon');
                    $transaksi_peserta->save();
                }
                DB::commit();

                return response()->json([
                    'success' => true,
                    'nama_pemesan' => $user->name,
                    'total_transaksi' => $total_transaksi,
                ]);
            }

            return response()->json([
                    'success' => false,
                ]);
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'reason' => $e->getMessage(),
            ]);
        }
    }
}
