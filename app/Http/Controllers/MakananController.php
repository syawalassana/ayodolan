<?php

namespace App\Http\Controllers;

use App\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=[
            'data' => Makanan::orderBy('nama_makanan')->paginate()
        ];
        return view('makanan.makanan',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makanan.makanan_tambah');
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
        $validator = Validator::make($request->all(), [
            'nama_makanan' => 'required', //data tidak boleh kosong
            'deskripsi' => 'required',
            'gambar_makanan' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5048',
        ], $messages
    );
        if ($validator->fails()) {
            return redirect('/event/create')
                    ->withErrors($validator)
                    ->withInput();
        }
        $data_makanan = new Makanan();
        $data_makanan->nama_makanan= $request->nama_makanan;
        $data_makanan->deskripsi = $request->deskripsi;
        if ($request->has('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            // isi nama dengan nama folder tempat kemana kamu file diupload
            $tujuan_upload = 'makanan';
            $gambar->move($tujuan_upload, $nama_gambar);
            $data_makanan->gambar = $nama_gambar;
        }
        $data_makanan->save();
        if ($data_makanan) {
            return redirect('/makanan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function show(Makanan $makanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Makanan $makanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Makanan $makanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Makanan  $makanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makanan $makanan)
    {
        
    }
}
