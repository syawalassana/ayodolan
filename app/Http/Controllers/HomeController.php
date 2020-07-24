<?php

namespace App\Http\Controllers;

use App\Event;
use App\Paket;
use App\Transaksi;
use App\Wisatawan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
