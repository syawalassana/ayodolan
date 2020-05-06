<?php

namespace App\Http\Controllers;

use App\PaketDetail;
use Illuminate\Http\Request;

class PaketDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = [
            'data'=>PaketDetail::orderBy('id')->paginate()
        ];
        return view('paket.paket_detail',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('paket.paket_detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaketDetail  $paketDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PaketDetail $paketDetail)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaketDetail  $paketDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PaketDetail $id)
    {
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaketDetail  $paketDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',

        ];
        $validator = Validator::make($request->all(),[
            'nama_wisata'=> 'required', //data tidak boleh kosong
            'obj_wisata_id' => 'required',
            'harga' => 'numeric|required',
            'gambar_paket' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'lama_kunjungan' => 'required',
        ],$messages
    );
        if ($validator->fails()){
          return redirect('/paket/create')
                    ->withErrors($validator)
                    ->withInput();
        }
    $data_paketdetail = PaketDetail::find($id);
    $data_paketdetail->id=$request->id;
    $data_paketdetail->obj_wisata_id=$request->obj_wisata_id;
    $data_paketdetail->lama_kunjungan = $request->lama_kunjungan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaketDetail  $paketDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaketDetail $paketDetail)
    {
        //
    }
}