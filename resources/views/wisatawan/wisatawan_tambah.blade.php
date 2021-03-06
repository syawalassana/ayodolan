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
    <h3 class="box-title">Form Tambah Data Wisatawan</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/wisatawan/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Wisatawan</label>
        <input type="text" name="nama_wisatawan" value="{{old('nama_wisatawan')}}" class="form-control"  placeholder="Masukan Nama Wisatawan">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control" name="lokasi" placeholder="Masukkan Email">
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" placeholder="Masukkan Tanggal Lahir" class="form-control">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" placeholder="Masukan Alamat Anda" >{{old('alamat')}}</textarea>
      </div>
      <div class="form-group">
        <label>No Telepon</label>
        <textarea name="telpon" class="form-control" placeholder="Masukan No HP Anda" >{{old('telpon')}}</textarea>
      </div>
      
      <div class="form-group">
        <label>Foto</label>
        <input input type="file" name="foto">
      </div>
      
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/wisatawan">Kembali</a>
    </div>
  </form>
</div>
@endsection