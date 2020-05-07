<?php

namespace App\Http\Controllers;

use App\GambarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GambarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
            'gambar_event'=> 'required', //data tidak boleh kosong
        ],$messages
    );
        if ($validator->fails()){
            return redirect('event-gambar/'.$request->mobil_id)
                    ->withErrors($validator)
                    ->withInput();
    }
    //return $request->all();
    $gambardetail = new GambarEvent();
    $gambar = $request->file('gambar_event');
    $nama_gambar = time()."_".$gambar->getClientOriginalName();
    $tujuan_upload = 'event';
    $gambar->move($tujuan_upload,$nama_gambar);
    $gambardetail->path = $tujuan_upload.'/'.$nama_gambar;
    $gambardetail->event_id=$request->event_id;
    $gambardetail->save();
    if($gambardetail){
        return redirect('event/'.$request->event_id);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\GambarEvent  $gambarEvent
     * @return \Illuminate\Http\Response
     */
    public function show(GambarEvent $gambarEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GambarEvent  $gambarEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(GambarEvent $gambarEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GambarEvent  $gambarEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GambarEvent $gambarEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GambarEvent  $gambarEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $gambarevent = GambarEvent::find($id);
        $event_id=$gambarevent->event_id;
        
        if(file_exists(public_path().$gambarevent->path)){
            //lokasi public/event
            //skrip untuk menghapus gambar ketika di update
        unlink($gambarevent->path);
        }
        $gambarevent->delete();
        return redirect("event/".$event_id);
}
}
