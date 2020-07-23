@extends('layouts.master')
@section('isi')
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
    <h3 class="box-title">Halaman Edit Data Paket</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  @if (count ($errors) > 0)
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{ $error}} </li>
        @endforeach
      </ul>
    </div>
    @endif

  <form action="/paket/{{$data->id}}" method="post" enctype="multipart/form-data">
  <input type="hidden" name="_method" value="PUT">
  @csrf
  <div class="box-body">
    <div class="form-group">
            <label>Nama Paket </label>
            <input type="text" name="nama_paket" value="{{$data->nama_paket}}" class="form-control"  placeholder="Masukan Nama Wisatawan">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" value="{{$data->deskripsi}}" class="form-control" name="lokasi" placeholder="Masukkan Email">
          </div>
          <div class="form-group">
            <label>harga</label>
            <input type="text" name="harga" value="{{$data->harga}}" placeholder="Masukkan Harga" class="form-control">
          </div>
          <div class="form-group">
            <label>Gambar Paket</label>
            <input input type="file" name="gambar_paket">
          </div>
          <div class="form-group">
            <select name="mobil_id" id="mobil_id" class="form-control">
                <option value="">Pilih Mobil</option>
                @foreach ($mobil as $row)
                    <option value="{{ $row->id }}" {{$data->mobil_id==$row->id?'selected':''}}>{{ $row->nama_mobil}}</option>
                @endforeach
            </select>
          </div>
          <select name="hotel_id" id="hotel_id" class="form-control">
            <option value="">Pilih Hotel</option>
            @foreach ($hotel as $row)
                <option value="{{ $row->id }}" {{$data->hotel_id==$row->id?'selected':''}}>{{ $row->nama_hotel}}</option>
            @endforeach
        </select>
          <div class="form-group">
            <label>lama liburan</label>
            <input type="text" name="lama_liburan" value="{{$data->lama_liburan}}" placeholder="Lama Liburan" class="form-control">
          </div>
          <div class="form-group">
            <div class="form-group">
                <label>Biaya Tour Guide</label>
                <input type="text" name="harga_tour_guide" value="{{$data->harga_tour_guide}}" class="form-control" placeholder="Harga Tour Guide">
              </div>
              <div class="form-group">
                <label>Biaya Supir</label>
                <input type="text" name="harga_supir" value="{{$data->harga_supir}}" class="form-control" name="harga_supir" placeholder="Harga Supir">
              </div>

  </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Update">
    <a class="btn btn-warning" href="/paket"> <i class="fa fa-arrow-left"></i> Kembali </a>
    </div>
  </form>
</div>
@endsection