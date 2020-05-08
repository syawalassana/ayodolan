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
    <h3 class="box-title">Form Tambah Data Paket</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/paket/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Paket </label>
        <input type="text" name="nama_paket" value="{{old('nama_paket')}}" class="form-control"  placeholder="Masukan Nama Wisatawan">
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="{{old('deskripsi')}}" class="form-control" name="lokasi" placeholder="Masukkan Deskripsi">
      </div>
      <div class="form-group">
        <label>Harga Paket</label>
        <input type="text" name="harga" value="{{old('harga')}}" placeholder="Masukkan Harga Paket Wisata" class="form-control">
      </div>
      <div class="form-group">
        <label>Gambar Paket Wisata</label>
        <input input type="file" name="gambar_paket">
      </div>
      <div class="form-group">
        <select name="paket" id="mobil_id" class="form-control">
            <option value=""></option>
            @foreach ($items as $mobil_id => $nama_mobil)
                <option value="{{ $mobil_id }}">{{ $nama_mobil }}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Id Hotel</label>
        <input type="text" name="id_hotel" value="{{old('id_hotel')}}" placeholder="Id Hotel" class="form-control">
      </div>
      <div class="form-group">
        <label>Lama Liburan</label>
        <input type="text" name="lama_liburan" value="{{old('lama_liburan')}}" placeholder="Berapa Lama Wisatawan Berlibur" class="form-control">
      </div>
      <div class="form-group">
        <label>Harga Supir</label>
        <input type="text" name="harga_supir" value="{{old('harga_supir')}}" placeholder="Masukkan Harga Supir" class="form-control">
      </div>
      <div class="form-group">
        <label>Harga Tour Guide</label>
        <input type="text" name="id_mobil" value="{{old('harga_tour_guide')}}" placeholder="Masukkan Harga Tour Guide" class="form-control">
      </div>
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/wisatawan">Kembali</a>
    </div>
  </form>
</div>
@endsection