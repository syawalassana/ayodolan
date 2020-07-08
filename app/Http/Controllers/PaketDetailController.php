<?php

namespace App\Http\Controllers;

use App\ObjekWisata;
use App\PaketDetail;
use Illuminate\Http\Request;
use App\Paket;
use Illuminate\Support\Facades\Validator;

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
            'data' => PaketDetail::orderBy('id')->paginate(),
        ];

        return view('paket.paket_detail', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $messages = [
            'required' => ':attribute Tidak Boleh Kosong',

        ];
        $validator = Validator::make($request->all(), [
            'obj_wisata_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ], $messages
    );
        if ($validator->fails()) {
            return redirect('/tambah-wisata/' . $request->paket_id)
                    ->withErrors($validator)
                    ->withInput();
        }
        $data_paketdetail = new PaketDetail;
        $data_paketdetail->obj_wisata_id = $request->obj_wisata_id;
        $data_paketdetail->paket_id = $request->paket_id;
        $data_paketdetail->start = $request->start;
        $data_paketdetail->end = $request->end;
        $data_paketdetail->save();
        if ($data_paketdetail) {
            return redirect('/paket/' . $data_paketdetail->paket_id);
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaketDetail  $paketDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaketDetail $id)
    {
    }
    public function tambahWisata($id)
    {
        $data = [
            'objekWisata' => ObjekWisata::all(),
            'data' => Paket::find($id),
        ];

        return view('paket.tambah_objek_wisata', $data);
    }
    public function hapusWisata($id)
    {
        $paketdetail = PaketDetail::find($id);
        $paketdetail->delete();

        return redirect('/paket/' . $id);
    }
}
