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
        <form action="/transaksi/{{$data->id}}" method="POST">
            <input type="hidden" name="_method" value="put">
            @csrf
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
                    <td>{{$data->tanggal_liburan_tx}}</td>
                </tr>
                <tr>
                    <th>Biaya Supir</th>
                    <td>{{$data->harga_supir_tx}}</td>
                </tr>
                <tr>
                    <th>Biaya Tour Guide</th>
                    <td>{{$data->harga_tour_guide_tx}}</td>
                </tr>
                <tr>
                    <th>Harga Paket</th>
                    <td>{{$data->harga_tx}}</td>
                </tr>
                <tr>
                    <th>Total Pembayaran</th>
                    <td>{{$data->total_transaksi_tx}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <select name="status" id="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="menunggu" {{$data->status=='menunggu'?'selected':''}}>Menunggu</option>
                            <option value="lunas" {{$data->status=='lunas'?'selected':''}}>Lunas</option>
                            <option value="batal" {{$data->status=='batal'?'selected':''}}>Batal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-right" colspan="2"><button type="submit" class="btn btn-primary">Simpan</button></td>
                </tr>
            </table>
        </form>
    <!-- /.box-body -->
    </div>
    <!-- /.box-body -->
</div>

@endsection
