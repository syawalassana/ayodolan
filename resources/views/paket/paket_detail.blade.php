@extends('layouts.master')
@section('isi')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Paket</h3>
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
        <td>{{$data->lama_liburan}}</td>
      </tr>
      <tr>
        <th>Harga Supir</th>
        <td>{{$data->harga_supir}}</td>
      </tr>
      <tr>
        <th>Harga Tour Guide</th>
        <td>{{$data->harga_tour_guide}}</td>
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
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Gambar Hotel</h3>
          <div class="box-tools">
            <div class="form-group">
              <a class="btn btn-success" href="/hotel-gambar/{{$data->id}}"> <i class="fa fa-plus"></i>Tambah Gambar</a>
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
          @foreach ($gambarhotel as $key=>$row)
          <tr>
              <td>{{$row->path}}</td>
              <td><img width="100" src="{{asset($row->path)}}"/></td> 
              <td>
                <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/hotel-gambar/{{$row->id}}" method="post">
                  @csrf
                <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
          </tr>
          @endforeach
         
        </table>
        </div>
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Gambar Objek Wisata</h3>
              <div class="box-tools">
                <div class="form-group">
                  <a class="btn btn-success" href="/obj_wisata-gambar/{{$data->id}}"> <i class="fa fa-plus"></i>Tambah Gambar</a>
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
              @foreach ($gambarwisata as $key=>$row)
              <tr>
                  <td>{{$row->path}}</td>
                  <td><img width="100" src="{{asset($row->path)}}"/></td> 
                  <td>
                    <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/obj_wisata-gambar/{{$row->id}}" method="post">
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
