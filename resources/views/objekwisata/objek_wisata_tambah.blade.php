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
    <h3 class="box-title">Form Objek Wisata</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/objek-wisata/" method="post" enctype="multipart/form-data">
  @csrf
    <div class="box-body">
      <div class="form-group">
        <label>Nama Wisata</label>
        <input type="text" name="nama_wisata" value="{{old('nama_wisata')}}" class="form-control"  placeholder="Masukan Nama">
      </div>
      <div class="form-group">
        <label>Lokasi Wisata</label>
        <input type="text" name="lokasi" value="{{old('lokasi')}}" class="form-control" placeholder="Lokasi Objek Wisata">
      </div>
      <div class="form-group">
        <label>Harga Tiket Masuk</label>
        <input type="text" name="harga" value="{{old('harga')}}" placeholder="Masukan Harga" class="form-control">
      </div>
      <div class="form-group">
        <label>Gambar Objek Wisata</label>
        <input input type="file" name="gambar">
      </div>
      <div class="form-group">
            <label>Tipe Objek Wisata</label>
            <select name="tipe_wisata" class="form-control">
                <option value="Pantai"{{old('tipe_wisata')=='Pantai'?'selected':''}}>Pantai</option>
                <option value="Gunung"{{old('tipe_wisata')=='Gunung'?'selected':''}}>Gunung</option>
                <option value="Goa"{{old('tipe_wisata')=='Goa'?'selected':''}}>Goa</option>
                <option value="Goa"{{old('tipe_wisata')=='Sungai'?'selected':''}}>Sungai</option>
             </select>
     </div>
     <div class="form-group">
            <label>Ciri Khas Objek Wisata</label>
            <input type="text" name="ciri_khas" value="{{old('ciri_khas')}}" class="form-control" placeholder="Ciri Khas Objek Wisata">
    </div>
      <div class="form-group">
        <label>Diskripsi Objek Wisata</label>
        <textarea name="deskripsi" class="form-control" placeholder="Masukan Diskripsi" >{{old('deskripsi')}}</textarea>
      </div>

    </div>
    <div class="box-footer">
    <input class="btn btn-primary" type="submit" value="Tambah">
        <a class="btn btn-warning" href="/objek-wisata">Kembali</a>
    </div>
  </form>
</div>
@endsection