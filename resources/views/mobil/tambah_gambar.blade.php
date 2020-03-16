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
  <form action="/mobil-gambar/" method="post" enctype="multipart/form-data">
  @csrf
    <input type="hidden" value="{{$data->id}}" name="mobil_id">
    <div class="box-body">
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