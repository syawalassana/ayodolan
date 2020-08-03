<?php

namespace App\Exports;

use App\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting, WithStrictNullComparison
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $transaksi = Transaksi::with('user', 'paket')->get();

        return $transaksi;
    }

    public function headings(): array
    {
        return [
            'No Invoice',
            'Nama Wisatawan',
            'Nama Paket',
            'Jumlah Peserta',
            'Tanggal Liburan',
            'Harga Supir',
            'Harga Tour Guide',
            'Harga Paket Wisata',
            'Status Pembayaran',
            'Tanggal Invoice',
            'Total',
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->nomor_invoice,
            $transaksi->user->name,
            $transaksi->paket->nama_paket,
            $transaksi->jumlah_peserta,
            $transaksi->tanggal_liburan_tx,
            $transaksi->harga_supir_tx,
            $transaksi->harga_tour_guide_tx,
            $transaksi->harga_tx,
            $transaksi->status,
            $transaksi->created_at->format('d-m-Y H:i'),
            $transaksi->total_transaksi_tx,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            // 'C' => NumberFormat::FORMAT_NUMBER,
            // 'F' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
