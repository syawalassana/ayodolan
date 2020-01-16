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
    <h3 class="box-title">Form Tambah Event</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/event/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
        <div class="form-group">
            <label>Nama Event</label>
            <input type="text" name="nama_event" value="{{old('nama_event')}}" class="form-control"  placeholder="Masukan Nama Event">
        </div>
        <div class="form-group">
            <label>Tanggal Event</label>
            <input type="date" name="tgl_event" value="{{old('tgl_event')}}" class="form-control" placeholder="Masukkan Tanggal Event">
        </div>
        <div class="form-group">
            <label>Tanggal Mulai Buat Event</label>
            <input type="date" name="tgl_mulai" value="{{old('tgl_mulai')}}" class="form-control" placeholder="Masukkan Tanggal Pembuatan Event">
        </div>
        <div class="form-group">
            <label>Tanggal Selesai Event</label>
            <input type="date" name="tgl_selesai" value="{{old('tgl_selesai')}}" class="form-control" placeholder="Masukkan Tanggal Selesai Event">
        </div>
        <div class="form-group">
            <label>Lokasi Event</label>
            <input name="lokasi" class="form-control" placeholder="Masukan Alamat Anda" >{{old('alamat')}}</textarea>
        </div>
        <div class="form-group">
            <label>Lokasi Event</label>
            <input type="text" name="lokasi" value="{{old('lokasi')}}" class="form-control"  placeholder="Masukan Lokasi Event">
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input input type="file" name="foto">
        </div>
        <div class="form-group">
            <label>Deskripsi Event</label>
            <input type="text" name="deskripsi_event" value="{{old('deskripsi_event')}}" class="form-control"  placeholder="Deskripsikan Event">
        </div>
    </div>
    <div class="box-footer">
        <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/event">Kembali</a>
    </div>
  </form>
</div>
@endsection