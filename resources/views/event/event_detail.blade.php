@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Event</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-warning" href="/event"> <i class="fa fa-arrow-left"></i> Kembali </a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>Nama Event</th>
        <td>{{$data->nama_event}}</td>
      </tr>
      <tr>
        <th>Tanggal Event</th>
        <td>{{$data->tgl_event}}</td>
      </tr>
      <tr>
        <th>Tanggal Mulai</th>
        <td>{{$data->tgl_mulai}}</td>
      </tr>
      <tr>
        <th>Tanggal Selesai</th>
        <td>{{$data->tgl_selesai}}</td>
      </tr>
      <tr>
        <th>Lokasi</th>
        <td>{{$data->lokasi}}</td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <td>{{$data->deskripsi_event}}</td>
      </tr>
    </table>
    </div>
    <!-- /.box-body -->
</div>
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Gambar Event</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-success" href="/event-gambar/{{$data->id}}"> <i class="fa fa-plus"></i>Tambah Gambar</a>
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
      @foreach ($gambarevent as $key=>$row)
      <tr>
          <td>{{$row->path}}</td>
          <td><img width="100" src="{{asset($row->path)}}"/></td> 
          <td>
            <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/event-gambar/{{$row->id}}" method="post">
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
