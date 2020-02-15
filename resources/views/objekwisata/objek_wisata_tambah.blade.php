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
    <h3 class="box-title">Form Objek Wisata</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/objek-wisata/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Wisata</label>
        <input type="text" name="nama_wisata" value="{{old('nama_wisata')}}" class="form-control"  placeholder="Masukan Nama">
      </div>
      <div class="form-group">
        <label>Lokasi Wisata</label>
        <input type="text" name="lokasi" value="{{old('lokasi')}}" class="form-control" name="lokasi" placeholder="Lokasi Objek Wisata">
      </div>
      <div class="form-group">
        <label>Harga Tiket</label>
        <input type="text" name="harga" value="{{old('harga')}}" placeholder="Masukan Harga" class="form-control">
      </div>
      <div class="form-group">
        <label>Gambar Objek Wisata</label>
        <input input type="file" name="gambar">
      </div>
      <div class="form-group">
        <label>Diskripsi Objek Wisata</label>
        <textarea name="deskripsi" class="form-control" placeholder="Masukan Diskripsi" >{{old('deskripsi')}}</textarea>
      </div>
      
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/objek-wisata">Kembali</a>
    </div>
  </form>
</div>
@endsection