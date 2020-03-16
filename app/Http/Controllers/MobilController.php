<?php

namespace App\Http\Controllers;

use App\GambarMobil;
use App\Hotel;
use App\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=[
            'data'=>Mobil::orderBy('nama_mobil')->paginate()
        ];
        return view('mobil.mobil',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil.mobil_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',
        ];
        $validator = Validator::make($request->all(),[
            'nama_mobil'=> 'required', //data tidak boleh kosong
            'kapasitas' => 'required',
            'harga_sewa' => 'required|numeric',
            'foto_mobil' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ],$messages
    );
    if ($validator->fails()){
        return redirect('/mobil/create')
                  ->withErrors($validator)
                  ->withInput();
    }
    $data_mobil = new Mobil;
    $data_mobil->nama_mobil=$request->nama_mobil;
    $data_mobil->kapasitas=$request->kapasitas;
    $data_mobil->harga_sewa=$request->harga_sewa;
    $gambar = $request->file('foto_mobil');
    $nama_gambar = time()."_".$gambar->getClientOriginalName();
    $tujuan_upload = 'mobil';
    $gambar->move($tujuan_upload,$nama_gambar);
    $data_mobil->foto_mobil = $nama_gambar;
    $data_mobil->save();
    if($data_mobil){
        return redirect('/mobil');
    }

    }

    /**
         * Display the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
       $items=[
            'data'=>Mobil::find($id),
            'gambarmobil'=>GambarMobil::where('mobil_id', $id)->get()
        ];
        return view('mobil.mobil_detail',$items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil=Mobil::find($id);
        return view('mobil.mobil_edit',['data'=>$mobil]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages=[
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',
        ];
        $validator = Validator::make($request->all(),[
            'nama_mobil'=> 'required', //data tidak boleh kosong
            'kapasitas' => 'required',
            'harga_sewa' => 'required|numeric',
            'foto_hotel' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ],$messages
    );
    if ($validator->fails()){
        return redirect('mobil/'.$id.'/edit')
                  ->withErrors($validator)
                  ->withInput();
    }
    $data_mobil = Mobil::find($id);
    $data_mobil->nama_mobil=$request->nama_mobil;
    $data_mobil->kapasitas=$request->kapasitas;
    $data_mobil->harga_sewa=$request->harga_sewa;
    if($request->has('foto_mobil')){
        $gambar = $request->file('foto_mobil');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        // isi nama dengan nama folder tempat kemana kamu file diupload
        $tujuan_upload = 'mobil';
        $gambar->move($tujuan_upload,$nama_gambar);
        if(file_exists('mobil/'.$data_mobil->foto_mobil)){
            //lokasi public/event
            //skrip untuk menghapus gambar ketika di update
        unlink('mobil/'.$data_mobil->foto_mobil);
        }
        $data_mobil->foto_mobil=$nama_gambar;
    }
    $data_mobil->save();
    if($data_mobil){
        return redirect('/mobil');
    }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();
        return redirect("/mobil");
    }
    
    public function tambah_gambar($id)
    {
        
        $items=[
            'data'=>Mobil::find($id)
        ];
        return view ('mobil.tambah_gambar', $items);
    }
}
