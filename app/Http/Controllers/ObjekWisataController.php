<?php

namespace App\Http\Controllers;
use App\ObjekWisata;
use App\User;
use Illuminate\Http\Request;
use Validator;

class ObjekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ObjekWisata::all();

        return view('objek_wisata', ['data'=> ObjekWisata::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('objek_wisata_tambah');
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
            'nama_wisata'=> 'required', //data tidak boleh kosong
            'lokasi' => 'required',
            'harga' => 'required | numeric',
            'gambar' => 'required',
            'deskripsi' => 'required',

        ],$messages);
        if ($validator->fails()){
          return redirect('/objek-wisata/create')
                    ->withErrors($validator)
                    ->withInput();
        }
        $data_wisata = new ObjekWisata;
        $data_wisata->nama_wisata = $request->nama_wisata;
        $data_wisata->lokasi = $request->lokasi;
        $data_wisata->harga = $request->harga;
        $data_wisata->gambar = $request->gambar;
        $data_wisata->deskripsi = $request->deskripsi;
        $data_wisata->save();
        if($data_wisata){
          return redirect('/objek-wisata');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('objek_wisata_edit', ['data'=>ObjekWisata]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'Ini testing';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testing(){
      return 'Ini testing';
    }
}
