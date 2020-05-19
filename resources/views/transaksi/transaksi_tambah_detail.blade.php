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
    <h3 class="box-title">Form Tambah Wisatawan</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/tambah-detail-wisatawan/" method="post" enctype="multipart/form-data">
  @csrf 
  <input type="hidden" name="transaksi_id" value="{{$data->id}}">
  <div class="box-body">
    <div class="form-group">
      <label>Nama Wisatawan</label>
      <input type="text" name="nama" value="{{old('nama')}}" class="form-control"  placeholder="Masukan Nama Peserta Wisata">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="gender" class="form_control">
            <option value="Laki-Laki"{{old('gender')=='Laki-Laki'?'selected':''}}>Laki - Laki</option>
            <option value="Perempuan"{{old('gender')=='Perempuan'?'selected':''}}>Perempuan</option>
         </select>
      </div>
      <div class="form-group">
        <label>Kontak</label>
        <input type="text" name="no_telepon" value="{{old('no_telepon')}}" class="form-control"  placeholder="Masukan Nomor Telepon Wisatawan">
      </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/objekwisata">Kembali</a>
    </div>
  </form>
</div>
@endsection