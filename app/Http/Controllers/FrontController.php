<?php

namespace App\Http\Controllers;

use App\Event;
use App\Paket;
use App\Transaksi;
use App\Wisatawan;

class FrontController extends Controller
{
    //
    public function index()
    {
        return view('home', [
            'transaksi_total' => Transaksi::where('status', 'lunas')->sum('total_transaksi'),
            'paket_wisata' => Paket::count(),
            'wisawatan' => Wisatawan::count(),
            'agenda' => Event::count(),
        ]);
    }
}
