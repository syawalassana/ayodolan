@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Data Paket Wisata</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-success" href="/paket/create"> <i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Nama Paket Wisata</th>
        <th>Harga Paket Wisata</th>
        <th>Gambar</th>
        <th>Lama Liburan Per/hari</th>
        <th class="text-center" colspan="3">OPSI</th>
      </tr>
      @foreach ($data as $key=>$row)
      <tr>
      <td>{{$key+1}}</td>
        <td>{{$row->nama_paket}}</td>
        <td>{{$row->harga_tx}}</td>
        <td><img width="100" src="{{$row->url_image}}"/></td>
        <td>{{$row->lama_liburan}}</td>
        <td><a class="btn btn-warning" href="/paket/{{$row->id}}/edit">Update</a></td>
        <td><a class="btn btn-info" href="/paket/{{$row->id}}">Lihat</a></td>
        <td>
          <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/paket/{{$row->id}}" method="post">
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
