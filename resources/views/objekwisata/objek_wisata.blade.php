@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Bordered Table</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-success" href="/objek-wisata/create"> <i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      </div>
    </div>
    <form class="form-inline my-2 my-lg-0" method="get" action="{{url('search')}}">
        <input class="form-control mr-sm-2" type="text" name="q" placeholder="Kata Kunci" aria-label="Search">
         <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
     </form>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
      <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Nama Wisata</th>
        <th>Lokasi</th>
        <th>Foto</th>
        <th class="text-center" colspan="4">OPSI</th>
      </tr>
      @foreach ($data as $key=>$row)
      <tr>
      <td>{{$key+1}}</td>
        <td>{{$row -> nama_wisata}}</td>
        <td>{{$row -> lokasi}}</td>
        <td><img width="100" src="/objekwisata/{{$row->gambar}}"/></td>
        <td><a class="btn btn-warning" href="/objek-wisata/{{$row->id}}/edit">Update</a></td>
        <td><a class="btn btn-info" href="/objek-wisata/{{$row->id}}">Detail</a></td>
        
        <td>
          <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/objek-wisata/{{$row->id}}" method="post">
            @csrf
          <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
      </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
            {{ $data->links() }}
    </div>
  </div>

@endsection
