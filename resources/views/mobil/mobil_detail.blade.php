@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Mobil</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-warning" href="/mobil"> <i class="fa fa-arrow-left"></i> Kembali </a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>Nama Mobil</th>
        <td>{{$data->nama_mobil}}</td>
      </tr>
      <tr>
        <th>Kapasitas</th>
        <td>{{$data->kapasitas}}</td>
      </tr>
      <tr>
        <th>Harga Sewa Mobil</th>
        <td>{{$data->harga_sewa}}</td>
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
          <a class="btn btn-success" href="/mobil-gambar/{{$data->id}}"> <i class="fa fa-plus"></i>Tambah Gambar</a>
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
      @foreach ($gambarmobil as $key=>$row)
      <tr>
          <td>{{$row->path}}</td>
          <td><img width="100" src="{{asset($row->path)}}"/></td> 
          <td>
            <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/mobil-gambar/{{$row->id}}" method="post">
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
