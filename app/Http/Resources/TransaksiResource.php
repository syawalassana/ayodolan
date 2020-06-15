<?php

namespace App\Http\Resources;
use App\Paket;
use App\Transaksi;
use App\User;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $nama=[];     
        $nama_wisatawan = Transaksi::where('user_id', $this->id)->get();
        foreach($nama_wisatawan as $key=>$value){
            $nama[]=$value->name;
        }
        return[
       'id'=> $this->id,
       'nomor_invoice'=> $this->nomor_invoice,
       'user_id'=> $this->user_id->string,
       'paket_id'=> $this->paket_id,
       'jumlah_peseserta'=> $this->jumlah_peserta,
       'harga_supir'=> $this->harga_supir,
       'harga_tour guide'=> $this->harga_tour_guide,
       'harga'=> $this->harga,
        ];
    
}
}