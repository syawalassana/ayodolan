<?php

namespace App\Http\Controllers;

use App\GambarWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GambarWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'gambar'=> 'required', //data tidak boleh kosong
        ],$messages
    );
        if ($validator->fails()){
            return redirect('objek_wisata-gambar/'.$request->obj_wisata_id)
                    ->withErrors($validator)
                    ->withInput();
    }
    $gambardetail = new GambarWisata();
    $gambar = $request->file('gambar');
    $nama_gambar = time()."_".$gambar->getClientOriginalName();
    $tujuan_upload = 'objekwisata';
    $gambar->move($tujuan_upload,$nama_gambar);
    $gambardetail->path = $tujuan_upload.'/'.$nama_gambar;
    $gambardetail->obj_wisata_id=$request->obj_wisata_id;
    $gambardetail->save();
    if($gambardetail){
        return redirect('objek-wisata/'.$request->obj_wisata_id);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\GambarWisata  $gambarWisata
     * @return \Illuminate\Http\Response
     */
    public function show(GambarWisata $gambarWisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GambarWisata  $gambarWisata
     * @return \Illuminate\Http\Response
     */
    public function edit(GambarWisata $gambarWisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GambarWisata  $gambarWisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GambarWisata $gambarWisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GambarWisata  $gambarWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $gambarwisata = GambarWisata::find($id);
            $objwisata_id=$gambarwisata->objwisata_id;
            
            if(file_exists($gambarwisata->path)){
                //lokasi public/event
                //skrip untuk menghapus gambar ketika di update
            unlink($gambarwisata->path);
            }
            $gambarwisata->delete();
            return redirect("objekwisata/".$objwisata_id);
    }
    }
}
