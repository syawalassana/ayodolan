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
    <h3 class="box-title">Halaman Edit Data Objek Wisata</h3>
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

  <form action="/objek-wisata/{{$data->id}}" method="post" enctype="multipart/form-data">
  <input type="hidden" name="_method" value="PUT">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Wisata</label>
        <input type="text" name="nama_wisata" value="{{$data->nama_wisata}}" class="form-control"  placeholder="Masukan Nama">
      </div>
      <div class="form-group">
        <label>Lokasi Wisata</label>
        <input type="text" name="lokasi" value="{{$data->lokasi}}" class="form-control" name="lokasi" placeholder="Lokasi Objek Wisata">
      </div>
      <div class="form-group">
        <label>Harga Tiket Masuk</label>
        <input type="text" name="harga" value="{{$data->harga}}" placeholder="Masukan Harga" class="form-control">
      </div>
      <div class="form-group">
        <label>Gambar Objek Wisata</label>
        <br/>
        <img width="100" src="/objekwisata/{{$data->gambar}}"/>
        <input input type="file" name="gambar" >
      </div>
      <div class="form-group">
        <label>Tipe Objek Wisata</label>
        <select name="tipe_wisata" class="form-control">
            <option value="Pantai">Pantai</option>
            <option value="Gunung">Gunung</option>
            <option value="Goa">Goa</option>    
        </select>
      </div>
      <div class="form-group">
            <label>Ciri Khas</label>
            <input type="text" name="ciri_khas" value="{{$data->ciri_khas}}" placeholder="Ciri Khas" class="form-control">
      </div>
      <div class="form-group">
        <label>Diskripsi Objek Wisata</label>
        <textarea name="deskripsi" class="form-control" placeholder="Masukan Diskripsi" >{{$data->deskripsi}}</textarea>
      </div>
      
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Update">
       <a href="/objek-wisata"><button type="button">Kembali</button></a>
    </div>
  </form>
</div>
@endsection