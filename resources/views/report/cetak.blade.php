<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Sistem Tour Guide Ayo Dolan</title>
    <style>
        table{
            font-size: 12px;
        }
    </style>
</head>
<body onload="window.print()">
    <h2 style="text-align: center;">Laporan Transaksi <br>Sistem Tour Guide Ayo Dolan</h2>
    <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nomor Invoice</th>
            <th>Nama Wisatawan</th>
            <th>Nama Paket</th>
            <th>Jumlah Peserta</th>
            <th>Tanggal Liburan</th>
            <th>Harga Supir</th>
            <th>Harga Tour Guide</th>
            <th>Harga Paket Wisata</th>
            <th>Status Pembayaran</th>
            <th>Tanggal Invoice</th>
            <th>Total</th>
        </tr>
        @foreach ($data as $key=>$row)
        <tr>
        <td>{{$key+1}}</td>
            <td>{{$row->nomor_invoice}}</td>
            <td>{{$row->user->name}}</td>
            <td>{{$row->paket->nama_paket}}</td>
            <td>{{$row->jumlah_peserta}}</td>
            <td>{{$row->tanggal_liburan_tx}}</td>
            <td>{{$row->harga_supir_tx}}</td>
            <td>{{$row->harga_tour_guide_tx}}</td>
            <td>{{$row->harga_tx}}</td>
            <td>{{$row->status}}</td>
            <td>
                {{$row->created_at->format('d-m-Y H:i')}}
            </td>
            <td>{{$row->total_transaksi_tx}}</td>
        </tr>
        @endforeach
        </table>
</body>
</html>