<?php

namespace App\Http\Resources;
use App\Paket;
use App\Transaksi;
use App\TransaksiPeserta;
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
        $transaksidetail= TransaksiPesertaResource::collection(TransaksiPeserta::all());
        
        return[
       'id'=> $this->id,
       'Nomor Invoice'=> $this->nomor_invoice,
       'Nama Wisatawan'=> $this->user->name,
       'Nama Paket'=> $this->paket->nama_paket,
       'jumlah_peseserta'=> $this->jumlah_peserta,
       'harga_supir'=> $this->harga_supir,
       'harga_tour guide'=> $this->harga_tour_guide,
       'harga'=> $this->harga,
       'detail'=> $transaksidetail,
        ];
    }
}