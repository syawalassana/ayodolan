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
    <h3 class="box-title">Halaman Tambah Data Makanan</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/makanan/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Makanan</label>
        <input type="text" name="nama_makanan" value="{{old('nama_makanan')}}" class="form-control"  placeholder="Masukan Nama Makanan">
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="{{old('deskripsi')}}" class="form-control"    placeholder="Deskripsi Makanan">
      </div>
      <div class="form-group">
        <label>Gambar Makanan</label>
        <input input type="file" name="gambar">
      </div>
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/makanan">Kembali</a>
    </div>
  </form>
</div>
@endsection