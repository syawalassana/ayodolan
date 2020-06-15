<?php

namespace App\Http\Resources;

use App\PaketDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class PaketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       $paketdetail = PaketDetailResource::collection(PaketDetail::all());
       return[
        'id'=> $this->id,
        'nama paket'=> $this->nama_paket,
        'deskripsi paket'=> $this->deskripsi,
        'harga paket'=> $this->harga,
        'gambar paket'=> $this->gambar_paket,
        'Nama Mobil'=> $this->mobil->nama_mobil,
        'hotel'=> $this->hotel->nama_hotel,
        'Harga Supir'=> $this->harga_supir,
        'Harga Tour Guide'=> $this->harga_tour_guide,
        'Detail Paket Wisata'=>$paketdetail, 
       ];
    }
}
