<?php

namespace App\Http\Controllers;

use App\Paket;
use App\PaketDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mobil;
use App\Hotel;
use App\ObjekWisata;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = [
                'data' => Paket::orderBy('nama_paket')->paginate(),
            ];

        return view('paket.paket', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'mobil' => Mobil::all(),
            'hotel' => Hotel::all(),
        ];

        return view('paket.paket_tambah', $data);
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
            'deskripsi' => 'required',
            'harga' => 'numeric|required',
            'gambar_paket' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'mobil_id' => 'required|numeric',
            'hotel_id' => 'required|numeric',
            'lama_liburan' => 'required',
            'harga_supir' => 'required|numeric',
            'harga_tour_guide' => 'required|numeric',
        ], $messages
    );
        if ($validator->fails()) {
            return redirect('/paket/create')
                    ->withErrors($validator)
                    ->withInput();
        }
        $data_paket = new Paket;
        $data_paket->nama_paket = $request->nama_paket;
        $data_paket->deskripsi = $request->deskripsi;
        $data_paket->harga = $request->harga;
        if ($request->has('gambar_paket')) {
            $gambar = $request->file('gambar_paket');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'paket';
            $gambar->move($tujuan_upload, $nama_gambar);
            $data_paket->gambar_paket= $nama_gambar;
            }
        $data_paket->mobil_id = $request->mobil_id;
        $data_paket->hotel_id = $request->hotel_id;
        $data_paket->lama_liburan = $request->lama_liburan;
        $data_paket->harga_supir = $request->harga_supir;
        $data_paket->harga_tour_guide = $request->harga_tour_guide;
        $data_paket->save();
        if ($data_paket) {
            return redirect('/paket');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = [
            'data' => Paket::find($id),
            'paketdetail' => PaketDetail::with('objekWisata')->where('paket_id', $id)->get(),
        ];

        return view('paket.paket_detail', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = Paket::find($id);

        return view('paket.paket_edit', [
            'data' => $paket,
            'mobil' => Mobil::all(),
            'hotel' => Hotel::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',

        ];
        $validator = Validator::make($request->all(), [
            'nama_paket' => 'required', //data tidak boleh kosong
            'deskripsi' => 'required',
            'harga' => 'numeric|required',
            'gambar_paket' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'mobil_id' => 'required|numeric',
            'hotel_id' => 'required|numeric',
            'harga_supir' => 'required|numeric',
            'harga_tour_guide' => 'required|numeric',
        ], $messages
    );
        if ($validator->fails()) {
            return redirect('/paket/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
        }
        $data_paket = Paket::find($id);
        $data_paket->nama_paket = $request->nama_paket;
        $data_paket->deskripsi = $request->deskripsi;
        $data_paket->harga = $request->harga;
        if ($request->has('gambar_paket')) {
            $gambar = $request->file('gambar_paket');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'paket';
            $gambar->move($tujuan_upload, $nama_gambar);
            if (file_exists('paket/' . $data_paket->gambar_paket)) {
                //skrip untuk menghapus data foto lama yang di update
                unlink('paket/' . $data_paket->gambar_paket);
            }
            $data_paket->gambar_paket = $nama_gambar;
        }
        $data_paket->mobil_id = $request->mobil_id;
        $data_paket->hotel_id = $request->hotel_id;
        $data_paket->lama_liburan = $request->lama_liburan;
        $data_paket->harga_supir = $request->harga_supir;
        $data_paket->harga_tour_guide = $request->harga_tour_guide;
        $data_paket->save();
        /* $data_paketdetail = new PaketDetail;
        $data_paketdetail->id = $request->id;
        $data_paketdetail->obj_wisata_id = $request->obj_wisata_id;
        $data_paketdetail->lama_kunjungan = $request->lama_kunjungan;
        $data_paketdetail->save(); */
        if ($data_paket) {
            return redirect('/paket/' . $data_paket->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::find($id);
        $paket->delete();
        $paket->paketDetail()->delete();

        return redirect('/paket');
    }
    public function tambahwisata($id)
    {
        $items = [
            'data' => ObjekWisata::find($id),
        ];

        return view('paket.tambah_objek_wisata', $items);
    }
}
