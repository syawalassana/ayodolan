@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Transaksi</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="form-group">
            <a href="/laporan-export" class="btn btn-primary">
                Export Excel
            </a>
        </div>
        <table class="table table-bordered">
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
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
            {{ $data->links() }}
    </div>
  </div>




    <table border="1">

    </table>
@endsection
