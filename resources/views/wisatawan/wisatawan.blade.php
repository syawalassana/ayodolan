@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Bordered Table</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-success" href="/wisatawan/create"> <i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Nama Wisatawan</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Foto</th>
        <th>Telpon</th>
        <th colspan="2">OPSI</th>
      </tr>
      @foreach ($data as $key=>$row)
      <tr>
      <td>{{$key+1}}</td>
        <td>{{$row->user->name}}</td>
        <td>{{$row->tanggal_lahir}}</td>
        <td>{{$row->alamat}}</td>
        <td><img width="100" src="/wisatawan/{{$row->foto }}"/></td>
        <td>{{$row->telpon}}</td>
        <td><a class="btn btn-warning" href="/wisatawan/{{$row->id}}/edit">Update</a></td>
        <td>
          <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/wisatawan/{{$row->id}}" method="post">
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
