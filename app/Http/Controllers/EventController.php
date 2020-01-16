<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=[
            'data'=>Event::orderBy('tgl_event')->paginate()
        ];
        return view('event.event', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.event_tambah');
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
                'required'=>':Kolom Harus Diisi',
                'numeric'=> ':Kolom Harus Berisi Angka', 
            ];

        $validator=Validator::make($request->all(),[
            'nama_event'=>'required',
            'tgl_event'=>'required',
            'tgl_mulai'=>'required',
            'tgl_akhir'=>'required',
            'lokasi'=>'required',
            'gambar_event'=>'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_event'=> 'required'
        ], $messages
        );
            if($validator->fails()){
                return redirect('/event/create')
                    ->withErrors($validator)
                    ->withInput();
            }
        $data_event=new Event;
        $data_event->nama_event=$request->nama_event;
        $data_event->tgl_event=$request->tgl_event;
        $data_event->tgl_mulai=$request->tgl_mulai;
        $data_event->tgl_selesai=$request->tgl_selesai;
        $data_event->lokasi=$request->lokasi;
        $data_event->gambar_event=$request->gambar_event;
        $data_event->deskripsi_event=$request->deskripsi_event;
        $data_event->save();
        if($data_event){
            return redirect ('/event');
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
        //
    }
}
