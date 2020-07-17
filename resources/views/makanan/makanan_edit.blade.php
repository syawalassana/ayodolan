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
    <h3 class="box-title">Halaman Edit Data Makanan</h3>
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

  <form action="/makanan/{{$data->id}}" method="post" enctype="multipart/form-data">
  <input type="hidden" name="_method" value="PUT">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Makanan</label>
        <input type="text" name="nama_makanan" value="{{$data->nama_makanan}}" class="form-control"  placeholder="Ubah Nama Makanan">
      </div>
    </div>
    <div class="form-group">
        <label>Deskripsi Makanan</label>
        <input type="text" name="deskripsi" value="{{$data->deskripsi}}" class="form-control"  placeholder="Ubah Deskripsi Makanan">
      </div>
      <div class="form-group">
        <label>Foto Makanan</label>
        <br/>
        <img width="100" src="/makanan/{{$data->gambar}}"/>
        <input input type="file" name="gambar" >
      </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Update">
    <a class="btn btn-warning" href="/makanan"> <i class="fa fa-arrow-left"></i> Kembali </a>
    </div>
  </form>
</div>
@endsection