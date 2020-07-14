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
    <h3 class="box-title">Halaman Edit Data Hotel</h3>
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

  <form action="/hotel/{{$data->id}}" method="post" enctype="multipart/form-data">
  <input type="hidden" name="_method" value="PUT">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Hotel</label>
        <input type="text" name="nama_hotel" value="{{$data->nama_hotel}}" class="form-control"  placeholder="Masukan Nama Hotel">
      </div>
    </div>
    <div class="form-group">
      <label>Alamat Hotel</label>
      <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" placeholder="Ubah Alamat Hotel">
    </div>
      <div class="form-group">
            <label>Harga Tiket per/malam</label>
            <input type="text" name="harga" value="{{$data->harga}}" placeholder="Ubah Harga tiket" class="form-control">
      <div class="form-group">
        <label>Foto Hotel</label>
        <br/>
        <img width="100" src="/hotel/{{$data->foto_hotel}}"/>
        <input input type="file" name="foto_hotel" >
      </div>
      <div class="form-group">
        <label>Google Map</label>
        <textarea name="gmap" class="form-control" placeholder="Ubah Nomor Telepon" >{{$data->gmap}}</textarea>
      </div>
      <div class="form-group">
        <label>No Telepon Hotel</label>
        <textarea name="no_telepon" class="form-control" placeholder="Ubah No Telepon Hotel" >{{$data->no_telepon}}</textarea>
      </div>
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Update">
    <a class="btn btn-warning" href="/hotel"> <i class="fa fa-arrow-left"></i> Kembali </a>
    </div>
  </form>
</div>
@endsection