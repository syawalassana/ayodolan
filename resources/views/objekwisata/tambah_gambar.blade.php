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
    <h3 class="box-title">Form Tambah Gambar Wisata</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/objek_wisata-gambar/" method="post" enctype="multipart/form-data">
  @csrf
    <input type="hidden" value="{{$data->id}}" name="obj_wisata_id">
    <div class="box-body">
      <div class="form-group">
        <label>Foto Objek Wisata</label>
        <input input type="file" name="gambar">
      </div>

    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/objekwisata">Kembali</a>
    </div>
  </form>
</div>
@endsection