@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Paket Wisata</h3>
      <div class="box-tools">
        <div class="form-group">
          <a class="btn btn-warning" href="/paket"> <i class="fa fa-arrow-left"></i> Kembali </a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Paket</th>
                <td>{{$data->nama_paket}}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{$data->deskripsi}}</td>
            </tr>
            <tr>
                <th>Lama Liburan</th>
                <td>{{$data->lama_liburan}} Hari</td>
            </tr>
            <tr>
                <th>Harga Supir</th>
                <td>{{$data->harga_supir_tx}}</td>
            </tr>
            <tr>
                <th>Harga Tour Guide</th>
                <td>{{$data->harga_tour_guide_tx}}</td>
            </tr>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box-body -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Objek Wisata</h3>
        <div class="box-tools">
            <div class="form-group">
                <a class="btn btn-success" href="/tambah-wisata/{{$data->id}}"> <i class="fa fa-plus"></i> Tambah Wisata</a>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>Wisata</th>
                <th>Lokasi</th>
                <th>Harga</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Opsi</th>
            </tr>
                @foreach ($data->paketDetail as $key=>$row)
                <tr>
                    <td>{{$row->objekWisata->nama_wisata}}</td>
                    <td>{{$row->objekWisata->lokasi}}</td>
                    <td>{{$row->objekWisata->harga}}</td>
                    <td>{{$row->start}}</td>
                    <td>{{$row->end}}</td>
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
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Gambar Mobil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                    <th>Nama Mobil</th>
                    <td>{{$data->mobil->nama_mobil}}</td>
                </tr>
                <tr>
                    <th>Kapasitas</th>
                    <td>{{$data->mobil->kapasitas}} Orang</td>
                </tr>
                <tr>
                    <th>Harga Sewa</th>
                    <td>{{$data->mobil->harga_sewa_tx}}</td>
                </tr>
                <tr>
                    <th>Foto Mobil</th>
                    <td>
                        @foreach ($data->mobil->mobildetail as $key=>$row)
                        <a href="{{asset($row->path)}}"><img width="70" src="{{asset($row->path)}}"/></a>
                        @endforeach
                    </td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Gambar Hotel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                    <th>Nama Hotel</th>
                    <td>{{$data->hotel->nama_hotel}}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>{{$data->hotel->harga_tx}}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{$data->hotel->alamat}}</td>
                </tr>
                <tr>
                    <th>Gmap</th>
                    <td>{{$data->hotel->gmap}}</td>
                </tr>
                <tr>
                    <th>No Telp</th>
                    <td>{{$data->hotel->no_telepon}}</td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td>
                        @foreach ($data->hotel->hoteldetail as $key=>$row)
                        <a href="{{asset($row->path)}}"><img width="70" src="{{asset($row->path)}}"/></a>
                        @endforeach
                    </td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
