<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WisatawanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'Nama Wisatawan'=> $this->user->name,
            'Tanggal Lahir'=> $this->tgl_lahir,
            'Alamat'=> $this->alamat,
            'Foto'=> $this->foto,
            'No Telepon'=> $this->telpon,
        ];
    }
}
