@extends ('layouts.master')
@section ('isi')
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
    <h3 class="box-title">Halaman Tambah Data Hotel</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/hotel/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Hotel</label>
        <input type="text" name="nama_hotel" value="{{old('nama_hotel')}}" class="form-control"  placeholder="Masukan Nama Hotel">
      </div>
      <div class="form-group">
        <label>Harga Tiket Hotel per/Malam</label>
        <input type="text" name="harga" value="{{old('harga')}}" placeholder="Masukan Harga" class="form-control">
      </div>
      <div class="form-group">
        <label>Alamat Hotel</label>
        <input type="text" name="alamat" value="{{old('alamat')}}" class="form-control" name="lokasi" placeholder="Lokasi Hotel">
      </div>
      <div class="form-group">
        <label>Foto Hotel</label>
        <input input type="file" name="foto_hotel">
      </div>
      <div class="form-group">
        <label>GMAP</label>
        <input type="text" name="gmap" value="{{old('gmap')}}" class="form-control" placeholder="GMAP">
      </div>
      <div class="form-group">
        <label>No Telepon Hotel</label>
        <input type="text" name="no_telepon" value="{{old('no_telepon')}}" class="form-control" placeholder="Masukan No Telepon Hotel" ></textarea>
      </div>
      
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/hotel">Kembali</a>
    </div>
  </form>
</div>
@endsection