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
            'id'=> $this->id,
            'nama paket wisata'=> $this->paket_id,
            'nama objek Wisata'=> $this->obj_wisata_id,
            'mulai'=> $this->start,
            'selesai'=> $this->end,
           ];
    }
}
