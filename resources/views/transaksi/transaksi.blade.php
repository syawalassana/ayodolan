@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Halaman Transaksi</h3>
      <div class="box-tools">
        
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Nomor Invoice</th>
        <th>Nama Wisatawan</th>
        <th>Nama Paket</th>
        <th>Jumlah Peserta</th>
        <th class="text-center" colspan="2">OPSI</th>
      </tr>
      @foreach ($data as $key=>$row)
      <tr>
      <td>{{$key+1}}</td>
        <td>{{$row->nomor_invoice}}</td>
        <td>{{$row->user->name}}</td>
        <td>{{$row->paket->nama_paket}}</td>
        <td>{{$row->jumlah_peserta}}</td>
        <td><a class="btn btn-info" href="/transaksi/{{$row->id}}">Lihat</a></td>
        <td>
          <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/paket/{{$row->id}}" method="post">
            @csrf
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
