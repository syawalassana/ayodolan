<?php

namespace App\Http\Controllers;

use App\GambarHotel;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = [
            'data' => Hotel::orderBy('nama_hotel')->paginate(),
        ];

        return view('hotel.hotel', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.hotel_tambah');
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
                'nama_hotel' => 'required', //data tidak boleh kosong
                'harga' => 'required|numeric',
                'alamat' => 'required',
                'foto_hotel' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'gmap' => 'required',
                'no_telepon' => 'required',
            ], $messages
        );
        if ($validator->fails()) {
            return redirect('/hotel/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data_hotel = new Hotel();
        $data_hotel->nama_hotel = $request->nama_hotel;
        $data_hotel->harga = $request->harga;
        $data_hotel->alamat = $request->alamat;
        if ($request->has('foto_hotel')) {
            $gambar = $request->file('foto_hotel');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            // isi nama dengan nama folder tempat kemana kamu file diupload
            $tujuan_upload = 'hotel';
            $gambar->move($tujuan_upload, $nama_gambar);
            $data_hotel->foto_hotel = $nama_gambar;
        }
        $data_hotel->gmap = $request->gmap;
        $data_hotel->no_telepon = $request->no_telepon;
        $data_hotel->save();
        if ($data_hotel) {
            return redirect('/hotel');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = [
            'data' => Hotel::find($id),
            'gambarhotel' => GambarHotel::where('hotel_id', $id)->get(),
        ];

        return view('hotel.hotel_detail', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);

        return view('hotel.hotel_edit', ['data' => $hotel]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',

        ];
        $validator = Validator::make($request->all(), [
            'nama_hotel' => 'required', //data tidak boleh kosong
            'harga' => 'required|numeric',
            'alamat' => 'required',
            'foto_hotel' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'gmap' => 'required',
            'no_telepon' => 'required',
        ], $messages
    );
        if ($validator->fails()) {
            return redirect('hotel/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
        }
        $data_hotel = Hotel::find($id);
        $data_hotel->nama_hotel = $request->nama_hotel;
        $data_hotel->harga = $request->harga;
        $data_hotel->alamat = $request->alamat;
        if ($request->has('foto_hotel')) {
            $gambar = $request->file('foto_hotel');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            // isi nama dengan nama folder tempat kemana kamu file diupload
            $tujuan_upload = 'hotel';
            $gambar->move($tujuan_upload, $nama_gambar);
            if (file_exists('hotel/' . $data_hotel->foto_hotel)) {
                //lokasi public/event
                //skrip untuk menghapus gambar ketika di update
                unlink('hotel/' . $data_hotel->foto_hotel);
            }
            $data_hotel->foto_hotel = $nama_gambar;
        }
        $data_hotel->gmap = $request->gmap;
        $data_hotel->no_telepon = $request->no_telepon;
        $data_hotel->save();
        if ($data_hotel) {
            return redirect('/hotel');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);//mencari data berdasarkan id pada model mobil
        $hotel_detail = GambarHotel::where('hotel_id', $hotel->id)->get(); //mencari data relasi dari data mobil pada table gambar_mobil
        foreach ($hotel_detail as $hd) {
            if (file_exists($hd->path)) { //pengecekan apakah datanya ada berdasarkan lokasi filenya.
                //skrip untuk menghapus data foto lama yang di update
            unlink($hd->path);  //proses menghapus gambar berdasarkan lokasi file
            }
            $hd->delete(); //menghapus data dari database pada table gambar mobil
        }
        if (file_exists(public_path() . 'hotel/' . $hotel->foto_hotel)) { //pengecekan data gambar pada table mobil
            //skrip untuk menghapus data foto lama yang di update
        unlink('hotel/' . $hotel->foto_hotel);    //proses menhapus yang ada pada table mobil
        }
        $hotel->delete(); //proses hapus dari database

        return redirect('/hotel')->with('success', 'Berhasil hapus data hotel!');
    }

    public function tambah_gambar($id)
    {
        $items = [
            'data' => Hotel::find($id),
        ];

        return view('hotel.tambah_gambar', $items);
    }
}
