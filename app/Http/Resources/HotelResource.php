<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\GambarHotel;
class HotelResource extends JsonResource
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
        $gambardetailhotel = GambarHotel::where('hotel_id', $this->id)->get();
        foreach($gambardetailhotel as $key=>$value){
            $gambardetail[]=$value->path;
        }
        
        return [
             'id'=> $this->id,
             'nama_hotel'=> $this->nama_wisata,
             'alamat'=> $this->alamat,
             'foto_hotel'=> $this->foto_hotel,
             'gmap'=> $this->gmap,
             'no_telepon'=> $this->ciri_khas,
             'gambar_detail'=> $gambardetail,

        ];
           
    }
    }
