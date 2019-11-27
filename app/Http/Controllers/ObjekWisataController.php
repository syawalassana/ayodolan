<?php

namespace App\Http\Controllers;

use App\ObjekWisata;
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
        $items=[
            'data'=> ObjekWisata::orderBy('nama_wisata')->paginate()
        ];
        return view('objekwisata.objek_wisata', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('objekwisata.objek_wisata_tambah');
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
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
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
        $gambar = $request->file('gambar');
		$nama_gambar = time()."_".$gambar->getClientOriginalName();

      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'objekwisata';
		$gambar->move($tujuan_upload,$nama_gambar);
        $data_wisata->gambar = $nama_gambar;
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
        $objekWisata=ObjekWisata::find($id);


        return view('objekwisata.objek_wisata_edit', ['data'=>$objekWisata]);

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
        $messages = [
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',

        ];
        $validator = Validator::make($request->all(),[ //memfalidasi form inputan
            'nama_wisata'=> 'required', //data tidak boleh kosong
            'lokasi' => 'required',
            'harga' => 'required | numeric',
            'gambar' => 'required',
            'deskripsi' => 'required',
            //required = data wajib diisi, numeric=data angka, email, uniqe=inputan tidak boleh sama dalam 1 table

        ],$messages);
        if ($validator->fails()){
          return redirect('objek-wisata/'.$id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
        }
        $data_wisata = ObjekWisata::find($id);
        $data_wisata->nama_wisata = $request->nama_wisata;
        $data_wisata->lokasi = $request->lokasi;
        $data_wisata->harga = $request->harga;
        if($request->has('gambar')){
            $gambar = $request->file('gambar');
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
              // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'objekwisata';
            $gambar->move($tujuan_upload,$nama_gambar);
            if(file_exists('objekwisata/'.$data_wisata->gambar)){
                //skrip untuk menghapus data foto lama yang di update
            unlink('objekwisata/'.$data_wisata->gambar);    
            }
            $data_wisata->gambar=$nama_gambar;
            
        }
        $data_wisata->deskripsi = $request->deskripsi;
        $data_wisata->save();
        if($data_wisata){
          return redirect('/objek-wisata');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objekwisata = ObjekWisata::find($id);
        $objekwisata->delete();
        return redirect("/objek-wisata");
    }

    public function testing(){

    }

}
