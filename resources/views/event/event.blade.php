@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Bordered Table</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-success" href="/event/create"> <i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Nama Event</th>
        <th>Tanggal Event</th>
        <th>Tanggal Mulai Event</th>
        <th>Tanggal Selesai Event</th>
        <th>Lokasi</th>
        <th>Gambar Event</th>
        <th>Deskripsi Event</th>
        <th colspan="2">OPSI</th>
      </tr>
      @foreach ($data as $key=>$row)
      <tr>
      <td>{{$key+1}}</td>
        <td>{{$row -> nama_event}}</td>
        <td>{{$row -> tgl_event}}</td>
        <td>{{$row -> tgl_mulai}}</td>
        <td>{{$row -> tgl_selesai}}</td>
        <td>{{$row -> lokasi}}</td>
        <td><img width="100" src="/event/{{$row -> gambar_event }}"/></td>
        <td>{{$row -> deskripsi_event}}</td>
        <td><a class="btn btn-warning" href="/event/{{$row->id}}/edit">Update</a></td>
        <td>
          <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/event/{{$row->id}}" method="post">
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
    <div class="box-footer clearfix">
            {{ $data->links() }}
    </div>
  </div>




    <table border="1">
     
    </table>
@endsection