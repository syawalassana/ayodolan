@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Transaksi</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-warning" href="/transaksi"> <i class="fa fa-arrow-left"></i> Kembali </a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
      <tr>
        <th>Nomor Invoice</th>
        <td>{{$data->nomor_invoice}}</td>
      </tr>
      <tr>
        <th>Nama Wisatawan</th>
        <td>{{$data->user->name}}</td>
      </tr>
      <tr>
        <th>Nama Paket</th>
        <td>{{$data->paket->nama_paket}}</td>
      </tr>
      <tr>
        <th>Jumlah Peserta</th>
        <td>{{$data->jumlah_peserta}}</td>
      </tr>
      <tr>
        <th>Tanggal Liburan</th>
        <td>{{$data->tanggal_liburan}}</td>
      </tr>
      <tr>
        <th>Biaya Supir</th>
        <td>{{$data->harga_supir}}</td>
      </tr>
      <tr>
        <th>Biaya Tour Guide</th>
        <td>{{$data->harga_tour_guide}}</td>
      </tr>
      <th>Harga Paket</th>
      <td>{{$data->harga}}</td>
      <tr>
        <th>Total Pembayaran</th>
        <td>{{$data->total_transaksi}}</td>
      </tr>
    </table>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Wisatawan</h3>
            <div class="box-tools">
                <div class="form-group">
                  
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kontak</th>
                    <th>Opsi</th>
                </tr>
                
                @foreach ($data->transaksiPeserta as $key=>$row)
                <tr>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->gender}}</td>
                    <td>{{$row->no_telepon}}</td>
                    <td>
                        <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/hapus-wisata/{{$row->id}}" method="post">
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
</div>
    <!-- /.box-body -->
</div>

@endsection
