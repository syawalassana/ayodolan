@extends ('layouts.master')
@section ('isi')
@if (count ($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
        <li> {{ $error}} </li>
    @endforeach
  </ul>
</div>
@endif
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Form Tambah Data Transaksi</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/transaksi/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nomor Invoice</label>
        <input type="text" name="nomor_invoice" value="{{old('nomor_invoice')}}" class="form-control"  placeholder="Masukan Nomor Invoice">
      </div>
      <div class="form-group">
        <label>Nama Wisatawan/Pemesan</label>
        <select name="user_id" id="user_id" class="form-control">
            <option value="">Pilih Nama Wisatawan</option>
            @foreach ($user as $row)
                <option value="{{ $row->id }}">{{ $row->name}}</option>
            @endforeach
        </select>
      </div>
        <div class="form-group">
            <label>Pilih Paket Wisata</label>
            <select name="paket_id" id="paket_id" class="form-control">
                <option value="">Pilih Paket</option>
                @foreach ($paket as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_paket}}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <label>Jumlah Peserta</label>
                    <input type="text" name="jumlah_peserta" value="{{old('jumlah_peserta')}}" class="form-control"  placeholder="Masukan jumlah peserta">
            </div>
      <div class="form-group">
        <label for="tanggal_liburan">Tanggal</label>
        <input type="date" id="tanggal_liburan" name="tanggal_liburan" value="{{old('tanggal_liburan')}}" placeholder="Masukkan Tanggal Berlibur" class="form-control">
      </div>
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/transaksi">Kembali</a>
    </div>
  </form>
</div>
@endsection