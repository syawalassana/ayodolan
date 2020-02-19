<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $messages = [
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',

        ];
        $validator = Validator::make($request->all(),[
            'nama_mobil'=> 'required', //data tidak boleh kosong
            'harga' => 'required',
            'alamat' => 'required',
            'foto_hotel' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'gmap'=> 'required',
            'no_telpon' => 'required|numeric',
        ],$messages
    );
        if ($validator->fails()){
          return redirect('/hotel/create')
                    ->withErrors($validator)
                    ->withInput();
        }
        $data_hotel = new Hotel;
        $data_hotel->nama_hotel=$request->nama_hotel;
        $data_hotel->harga=$request->harga;
        $data_hotel->alamat=$request->alamat;
        $gambar = $request->file('foto_hotel');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        $tujuan_upload = 'hotel';

        $gambar->move($tujuan_upload,$nama_gambar);
        $data_hotel->foto_hotel = $nama_gambar;
        $data_hotel->gmap=$request->gmap;
        $data_hotel->save();
        if($data_hotel){
            return redirect ('/hotel');
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
            $event=Event::find($id);
            return view('event.event_edit', ['data'=>$event]);
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
            //return $request->all();
            $messages = [
                'required' => ':attribute Tidak Boleh Kosong',
                'numeric' => ':attribute harus angka',
    
            ];
            $validator = Validator::make($request->all(),[
                'nama_event'=> 'required', //data tidak boleh kosong
                'lokasi' => 'required',
                'gambar_event' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
                'deskripsi_event' => 'required',
            ],$messages
        );
            if ($validator->fails()){
                return redirect('event/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
            }
            $data_event = Event::find($id);
            $data_event->nama_event=$request->nama_event;
            $data_event->tgl_event=$request->tgl_event;
            $data_event->tgl_mulai=$request->tgl_mulai;
            $data_event->tgl_selesai=$request->tgl_selesai;
            $data_event->lokasi=$request->lokasi;
            if($request->has('gambar_event')){
                $gambar = $request->file('gambar_event');
                $nama_gambar = time()."_".$gambar->getClientOriginalName();
                // isi nama dengan nama folder tempat kemana kamu file diupload
                $tujuan_upload = 'event';
                $gambar->move($tujuan_upload,$nama_gambar);
                if(file_exists('event/'.$data_event->gambar_event)){
                    //lokasi public/event
                    //skrip untuk menghapus gambar ketika di update
                unlink('event/'.$data_event->gambar_event);
                }
                $data_event->gambar_event=$nama_gambar;
            }
        
            $data_event->deskripsi_event=$request->deskripsi_event;
            $data_event->save();
            if($data_event){
                return redirect ('/event');
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
        $event = Event::find($id);
        $event->delete();
        return redirect("/event");
    }
}
