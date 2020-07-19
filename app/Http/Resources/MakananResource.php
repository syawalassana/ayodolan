<?php

namespace App\Http\Resources;
use App\Makanan;
use Illuminate\Http\Resources\Json\JsonResource;

class MakananResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_makanan' => $this->nama_makanan,
            'deskripsi' => $this->deskripsi,
            'gambar' => $this->gambar,
        ];
    }
}
