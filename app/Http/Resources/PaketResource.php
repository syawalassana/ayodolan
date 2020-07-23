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
        'lama_liburan' => $this->lama_liburan,
        'harga_paket' => $this->harga_tx,
        'gambar_paket' => $this->url_image,
        'mobil' => [
            'nama' => $this->mobil->nama_mobil,
            'kapasitas' => $this->mobil->kapasitas,
        ],
        'hotel' => [
            'nama' => $this->hotel->nama_hotel,
            'alamat' => $this->hotel->alamat,
        ],
        'harga_supir' => $this->harga_supir_tx,
        'harga_tour_guide' => $this->harga_tour_guide_tx,
        'detail_paket_wisata' => $paketdetail,
        'harga_final' => $this->harga_final_tx,
        'harga_final_r' => $this->harga_final,
        'harga_supir_r' => $this->harga_supir,
        'harga_tour_guide_r' => $this->harga_tour_guide,
        'percent_margin' => '1.2',
       ];
    }
}
