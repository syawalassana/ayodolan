@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Hotel</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-warning" href="/hotel"> <i class="fa fa-arrow-left"></i> Kembali </a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>Nama Hotel</th>
        <td>{{$data->nama_hotel}}</td>
      </tr>
      <tr>
        <th>Harga Kamar</th>
        <td>{{$data->harga}}</td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td>{{$data->alamat}}</td>
      </tr>
      <tr>
        <th>Google Map</th>
        <td>{{$data->gmap}}</td>
      </tr>
      <tr>
        <th>Nomor Telepon</th>
        <td>{{$data->no_telepon}}</td>
      </tr>
    </table>
    </div>
    <!-- /.box-body -->
</div>
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Gambar Hotel</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-success" href="/hotel-gambar/{{$data->id}}"> <i class="fa fa-plus"></i>Tambah Gambar</a>
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
      @foreach ($gambarhotel as $key=>$row)
      <tr>
          <td>{{$row->path}}</td>
          <td><img width="100" src="{{asset($row->path)}}"/></td> 
          <td>
            <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/hotel-gambar/{{$row->id}}" method="post">
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
