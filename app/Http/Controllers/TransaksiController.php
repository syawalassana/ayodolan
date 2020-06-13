<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Transaksi;
use App\Wisatawan;
use Illuminate\Http\Request;
use App\User;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=[
            'data'=>Transaksi::orderBy('nomor_invoice')->paginate()
        ];
        return view('transaksi.transaksi',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'transaksi'=>Transaksi::all(),
            'user'=>User::where('role_id',2)->get(),
            'paket'=>Paket::all(),
        ];
        
        return view('transaksi.transaksi_tambah',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paket=Paket::find($request->paket_id);
        $data_transaksi = new Transaksi;
        $data_transaksi->nomor_invoice=$request->nomor_invoice;
        $data_transaksi->user_id=$request->user_id;
        $data_transaksi->paket_id=$request->paket_id;
        $data_transaksi->jumlah_peserta=$request->jumlah_peserta;
        $data_transaksi->tanggal_liburan=$request->tanggal_liburan;

        $data_transaksi->harga_supir=$paket->harga_supir;
        $data_transaksi->harga_tour_guide=$paket->harga_tour_guide;
        $data_transaksi->harga=$paket->harga;
        $data_transaksi->total_transaksi=(($paket->harga_supir+$paket->harga_tour_guide+$paket->harga)*$data_transaksi->jumlah_peserta*1.2);
        $data_transaksi->save();
        if ($data_transaksi) {
            return redirect('/transaksi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $items=[
            'data'=>Transaksi::with('transaksiPeserta')->find($id)
        ];
       // dd($items);
        return view('transaksi.transaksi_detail',$items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
    public function tambah_data($id){
        $data=[
            'data'=>Transaksi::find($id),
        ];
       return view ('transaksi.transaksi_tambah_detail', $data);
    }
}
