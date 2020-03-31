<?php

namespace App\Http\Controllers;

use App\GambarHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GambarHotelController extends Controller
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
            'foto_hotel'=> 'required', //data tidak boleh kosong
        ],$messages
    );
        if ($validator->fails()){
            return redirect('mobil-hotel/'.$request->hotel_id)
                    ->withErrors($validator)
                    ->withInput();
    }
    $gambardetail = new GambarHotel();
    $gambar = $request->file('foto_hotel');
    $nama_gambar = time()."_".$gambar->getClientOriginalName();
    $tujuan_upload = 'hotel';
    $gambar->move($tujuan_upload,$nama_gambar);
    $gambardetail->path = $tujuan_upload.'/'.$nama_gambar;
    $gambardetail->hotel_id=$request->hotel_id;
    $gambardetail->save();
    if($gambardetail){
        return redirect('hotel/'.$request->hotel_id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambarhotel = GambarHotel::find($id);
        $hotel_id=$gambarhotel->hotel_id;
        
        if(file_exists($gambarhotel->path)){
            //lokasi public/event
            //skrip untuk menghapus gambar ketika di update
        unlink($gambarhotel->path);
        }
        $gambarhotel->delete();
        return redirect("hotel/".$hotel_id);
}
}
