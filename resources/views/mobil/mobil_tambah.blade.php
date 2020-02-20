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
    <h3 class="box-title">Form Data Mobil</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/mobil/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Mobil</label>
        <input type="text" name="nama_mobil" value="{{old('nama_mobil')}}" class="form-control"  placeholder="Masukan Nama Mobil">
      </div>
      <div class="form-group">
        <label>Kapasitas Mobil</label>
        <input type="text" name="kapasitas" value="{{old('kapasitas')}}" class="form-control" placeholder="Kapasitas Mobil">
      </div>
      <div class="form-group">
        <label>Harga Sewa Mobil</label>
        <input type="text" name="harga_sewa" value="{{old('harga_sewa')}}" placeholder="Masukan Harga" class="form-control">
      </div>
      <div class="form-group">
        <label>Foto Mobil</label>
        <input input type="file" name="foto_mobil">
      </div>

    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/mobil">Kembali</a>
    </div>
  </form>
</div>
@endsection