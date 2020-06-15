<?php

namespace App\Http\Resources;

use App\GambarWisata;
use App\ObjekWisata;
use Illuminate\Http\Resources\Json\JsonResource;

class ObjekWisataResource extends JsonResource
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
        $gambardetailwisata = GambarWisata::where('obj_wisata_id', $this->id)->get();
        foreach($gambardetailwisata as $key=>$value){
            $gambardetail[]=$value->path;
        }
        
        return [
             'id'=> $this->id,
             'nama_wisata'=> $this->nama_wisata,
             'lokasi'=> $this->lokasi,
             'gambar'=> $this->gambar,
             'tipe_wisata'=> $this->tipe_wisata,
             'ciri_khas'=> $this->ciri_khas,
             'deskripsi' => $this->deskripsi,
             'gambar_detail'=> $gambardetail,

        ];
           
    }
}
