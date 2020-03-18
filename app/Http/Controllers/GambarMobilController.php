<?php

namespace App\Http\Controllers;

use App\GambarMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GambarMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
        $messages = [
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',

        ];
        $validator = Validator::make($request->all(),[
            'foto_mobil'=> 'required', //data tidak boleh kosong
        ],$messages
    );
        if ($validator->fails()){
            return redirect('mobil-gambar/'.$request->mobil_id)
                    ->withErrors($validator)
                    ->withInput();
    }
    $gambardetail = new GambarMobil();
    $gambar = $request->file('foto_mobil');
    $nama_gambar = time()."_".$gambar->getClientOriginalName();
    $tujuan_upload = 'mobil';
    $gambar->move($tujuan_upload,$nama_gambar);
    $gambardetail->path = $tujuan_upload.'/'.$nama_gambar;
    $gambardetail->mobil_id=$request->mobil_id;
    $gambardetail->save();
    if($gambardetail){
        return redirect('mobil/'.$request->mobil_id);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\GambarMobil  $gambarMobil
     * @return \Illuminate\Http\Response
     */
    public function show(GambarMobil $gambarMobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GambarMobil  $gambarMobil
     * @return \Illuminate\Http\Response
     */
    public function edit(GambarMobil $gambarMobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GambarMobil  $gambarMobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GambarMobil $gambarMobil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GambarMobil  $gambarMobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $gambarmobil = GambarMobil::find($id);
            $mobil_id=$gambarmobil->mobil_id;
            
            if(file_exists($gambarmobil->path)){
                //lokasi public/event
                //skrip untuk menghapus gambar ketika di update
            unlink($gambarmobil->path);
            }
            $gambarmobil->delete();
            return redirect("mobil/".$mobil_id);
    }
}
