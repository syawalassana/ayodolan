<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaketDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'wisata' => $this->objekWisata->nama_wisata,
            'gambar' => $this->objekWisata->url_image,
            'mulai' => $this->start,
            'selesai' => $this->end,
            'lokasi' => $this->objekWisata->lokasi,
           ];
    }
}
