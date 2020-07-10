<?php

namespace App\Http\Resources;

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
        return[
            'id' => $this->id,
            'nomor_invoice' => $this->nomor_invoice,
            'nama' => $this->user->name,
            'nama_paket' => $this->paket->nama_paket,
            'total_transaksi' => $this->total_transaksi_tx,
            'jumlah_peserta' => $this->jumlah_peserta,
            'harga_supir' => $this->harga_supir_tx,
            'harga_tour_guide' => $this->harga_tour_guide_tx,
            'harga' => $this->harga_tx,
            'status' => $this->status,
            'tanggal_liburan' => date('d-m-Y', strtotime($this->tanggal_liburan)),
            'tanggal_invoice' => $this->created_at->format('d-m-Y H:i'),
            'link_wa' => 'https://wa.me/6285895986529',
        ];
    }
}
