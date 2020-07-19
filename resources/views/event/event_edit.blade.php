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
    <h3 class="box-title">Halaman Edit Data Event</h3>
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

  <form action="/event/{{$data->id}}" method="post" enctype="multipart/form-data">
  <input type="hidden" name="_method" value="PUT">
  @csrf
  <div class="box-body">
    <div class="form-group">
        <label>Nama Event</label>
        <input type="text" name="nama_event" value="{{$data->nama_event}}" class="form-control"  placeholder="Masukan Nama Event">
    </div>
    <div class="form-group">
        <label>Tanggal Event</label>
        <input type="date" name="tgl_event" value="{{$data->tgl_event}}" class="form-control" placeholder="Masukkan Tanggal Event">
    </div>
    <div class="form-group">
        <label>Tanggal Mulai Buat Event</label>
        <input type="date" name="tgl_mulai" value="{{$data->tgl_mulai}}" class="form-control" placeholder="Masukkan Tanggal Pembuatan Event">
    </div>
    <div class="form-group">
        <label>Tanggal Selesai Event</label>
        <input type="date" name="tgl_selesai" value="{{$data->tgl_selesai}}" class="form-control" placeholder="Masukkan Tanggal Selesai Event">
    </div>
    <div class="form-group">
        <label>Lokasi Event</label>
        <input type="text" name="lokasi" value="{{$data->lokasi}}" class="form-control"  placeholder="Masukan Lokasi Event">
    </div>
    <div class="form-group">
        <label>Foto</label>
        <img width="100" src="/event/{{$data->gambar_event}}"/>
        <input input type="file" name="gambar_event">
    </div>
    <div class="form-group">
        <label>Deskripsi Event</label>
        <input type="text" name="deskripsi_event" value="{{$data->deskripsi_event}}" class="form-control"  placeholder="Deskripsikan Event">
    </div>
</div>
<div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Update">
    <a class="btn btn-warning" href="/event">Kembali</a>
</div>
</form>
</div>
@endsection