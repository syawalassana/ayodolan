<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\TransaksiPeserta;
use Illuminate\Http\Request;

class TransaksiPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = [
            'data'=>TransaksiPeserta::orderBy('id')->paginate()
        ];
        return view('transaksi.transaksi_detail',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi_peserta=new TransaksiPeserta();
        $transaksi_peserta->transaksi_id=$request->transaksi_id;
        $transaksi_peserta->nama=$request->nama;
        $transaksi_peserta->gender=$request->gender;
        $transaksi_peserta->no_telepon=$request->no_telepon;
        $transaksi_peserta->save();
        if($transaksi_peserta){
            return redirect('transaksi/'.$request->transaksi_id);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiPeserta  $transaksiPeserta
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiPeserta $transaksiPeserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiPeserta  $transaksiPeserta
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPeserta $transaksiPeserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiPeserta  $transaksiPeserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiPeserta $transaksiPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiPeserta  $transaksiPeserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPeserta $transaksiPeserta)
    {
        //
    }
    }