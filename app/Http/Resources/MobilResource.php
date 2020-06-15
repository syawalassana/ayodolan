<?php

namespace App\Http\Resources;

use App\GambarMobil;
use Illuminate\Http\Resources\Json\JsonResource;

class MobilResource extends JsonResource
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
        $gambardetailmobil = GambarMobil::where('mobil_id', $this->id)->get();
        foreach($gambardetailmobil as $key=>$value){
            $gambardetail[]=$value->path;
        }
        
        return [
             'id'=> $this->id,
             'nama mobil'=> $this->nama_mobil,
             'kapasitas'=> $this->kapasitas,
             'foto_mobil'=> $this->foto_mobil,
             'gambar_detail'=> $gambardetail,
        ];
    }
}
