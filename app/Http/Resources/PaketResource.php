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
        'id' => $this->id,
        'nama_paket' => $this->nama_paket,
        'deskripsi_paket' => $this->deskripsi,
        'harga_paket' => $this->harga_tx,
        'gambar_paket' => $this->url_image,
        'nama_mobil' => $this->mobil->nama_mobil,
        'hotel' => $this->hotel->nama_hotel,
        'harga_supir' => $this->harga_supir_tx,
        'harga_tour_guide' => $this->harga_tour_guide_tx,
        'detail_paket_wisata' => $paketdetail,
       ];
    }
}
