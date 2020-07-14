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
    <h3 class="box-title">Halaman Edit Data Mobil</h3>
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

  <form action="/mobil/{{$data->id}}" method="post" enctype="multipart/form-data">
  <input type="hidden" name="_method" value="PUT">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Mobil</label>
        <input type="text" name="nama_mobil" value="{{$data->nama_mobil}}" class="form-control"  placeholder="Ubah Nama Mobil">
      </div>
    </div>
    <div class="form-group">
        <label>Kapasitas Mobil</label>
        <input type="text" name="kapasitas" value="{{$data->kapasitas}}" class="form-control" name="lokasi" placeholder="Kapasitas Mobil">
      </div>
      <div class="form-group">
        <label>Harga Sewa Mobil</label>
        <input type="text" name="harga_sewa" value="{{$data->harga_sewa}}" placeholder="Masukan Harga" class="form-control">
      </div>
      <div class="form-group">
        <label>Foto Mobil</label>
        <br/>
        <img width="100" src="/mobil/{{$data->foto_mobil}}"/>
        <input input type="file" name="foto_mobil" >
      </div>
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Update">
    <a class="btn btn-warning" href="/mobil"> <i class="fa fa-arrow-left"></i> Kembali </a>
    </div>
  </form>
</div>
@endsection