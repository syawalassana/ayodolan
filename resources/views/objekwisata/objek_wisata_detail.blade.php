@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Objek Wisata</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-warning" href="/objekwisata"> <i class="fa fa-arrow-left"></i> Kembali </a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>Nama Objek Wisata</th>
        <td>{{$data->nama_wisata}}</td>
      </tr>
      <tr>
        <th>Lokasi</th>
        <td>{{$data->lokasi}}</td>
      </tr>
      <tr>
        <th>Harga Tiket Masuk</th>
        <td>{{$data->harga}}</td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <td>{{$data->deskripsi}}</td>
      </tr>
    </table>
    </div>
    <!-- /.box-body -->
</div>
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Gambar Mobil</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-success" href="/objek_wisata-gambar/{{$data->id}}"> <i class="fa fa-plus"></i>Tambah Gambar</a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>Path</th>
        <th>Gambar</th>
        <th>Opsi</th>
      </tr>
      @foreach ($gambarwisata as $key=>$row)
      <tr>
          <td>{{$row->path}}</td>
          <td><img width="100" src="{{asset($row->path)}}"/></td> 
          <td>
            <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/objek_wisata-gambar/{{$row->id}}" method="post">
              @csrf
            <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
      </tr>
      @endforeach
     
    </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection
