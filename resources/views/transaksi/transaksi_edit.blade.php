@extends('layouts.master')
@section('isi')
@if (count ($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
        <li> {{ $error}} </li>
    @endforeach
  </ul>
</div>
@endif
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Halaman Edi Status Transaksi</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  @if (count ($errors) > 0)
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{ $error}} </li>
        @endforeach
      </ul>
    </div>
    @endif

  <form action="/transaksi/{{$data->id}}" method="post" enctype="multipart/form-data">
  <input type="hidden" name="_method" value="PUT">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nomor Invoice</label>
        <input type="text" readonly name="nomor_invoice" value="{{$data->nomor_invoice}}" class="form-control"  placeholder="">
      </div>
      <div class="form-group">
        <label>Nama Wisatawan</label>
        <input type="text" name="user_id" value="{{$data->user_id}}" class="form-control" name="Nama User" placeholder="Lokasi Objek Wisata">
      </div>
      <div class="form-group">
        <label>Nama Paket</label>
        <input type="text" name="paket_id" value="{{$data->paket_id}}" placeholder="Nama Paket" class="form-control">
      </div>
      <div class="form-group">
        <label> Jumlah Peserta</label>
        <input type="text" name="jumlah_peserta" value="{{$data->jumlah_peserta}}" placeholder="Jumlah Peserta" class="form-control">
      </div>
      <div class="form-group">
        <label>Total Transaksi</label>
        <input type="text" name="total_transaksi" value="{{$data->total_transaksi}}" placeholder="Total Transaksi" class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal Liburan</label>
        <input type="text" name="tanggal_liburan" value="{{$data->tanggal_liburan}}" placeholder="Tanggal Liburan" class="form-control">
      </div>
      <div class="form-group">
        <label>Harga Supir</label>
        <input type="text" name="harga_supir" value="{{$data->harga_supir}}" placeholder="Harga Supir" class="form-control">
      </div>
      <div class="form-group">
        <label>Harga Tour Guide</label>
        <input type="text" name="harga_tour_guide" value="{{$data->harga_tour_guide}}" placeholder="Harga Tour Guide" class="form-control">
      </div>
      <div class="form-group">
        <label>Harga Paket Wisata</label>
        <input type="text" name="harga" value="{{$data->harga}}" placeholder="Harga Paket Wisata" class="form-control">
      </div>
      <div class="form-group">
        <label>Status Pemesanan</label>
        <select name="tipe_wisata" class="form-control">
            <option value="menunggu">Menunggu</option>
            <option value="lunas">Lunas</option>
            <option value="batas">Batal</option>    
        </select>
      </div>
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Update">
       <a href="/transaksi"><button type="button">Kembali</button></a>
    </div>
  </form>
</div>
@endsection