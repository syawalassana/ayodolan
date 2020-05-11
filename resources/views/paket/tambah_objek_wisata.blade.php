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
    <h3 class="box-title">Form Tambah Objek Wisata</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/tambah-wisata" method="post" enctype="multipart/form-data">
  @csrf
    <input type="hidden" value="{{$data->id}}" name="paket_id">
    <div class="box-body">
        <div class="form-group">
            <select name="obj_wisata_id" id="obj_wisata_id" class="form-control">
                <option value="">Pilih Objek Wisata</option>
                @foreach ($objekWisata as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_wisata}}</option>
                @endforeach
            </select>
          </div>
            <label>Mulai</label>
                <input type="time" name="start" value="{{old('start')}}" class="form-control"  placeholder="Masukan Waktu">
            <label>Selesai</label>
                <input type="time" name="end" value="{{old('end')}}" class="form-control"  placeholder="Masukan Waktu">
    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/objekwisata">Kembali</a>
    </div>
  </form>
</div>
@endsection