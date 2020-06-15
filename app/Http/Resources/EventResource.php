<?php

namespace App\Http\Resources;

use App\GambarEvent;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $gambardetail=[];     
        $gambardetailevent = GambarEvent::where('event_id', $this->id)->get();
        foreach($gambardetailevent as $key=>$value){
            $gambardetail[]=$value->path;
        }
        
        return [
             'id'=> $this->id,
             'nama_hotel'=> $this->nama_event,
             'tanggal Mulai' => $this->tgl_event,
             'lokasi'=> $this->lokasi,
             'Gambar event'=> $this->gambar_event,
             'deskripsi event'=> $this->deskripsi_event,
             'gambar_detail'=> $gambardetail,

        ];
    }
}
