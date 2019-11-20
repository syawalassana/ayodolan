<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form Tambah</title>
</head>
<body>
  @if (count ($errors) > 0)
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{ $error}} </li>
        @endforeach
      </ul>
    </div>
    @endif
  <form action="/objek-wisata/" method="post">
    @csrf
    <table>
    <tr>
      <td>
        Nama Wisata
      </td>
      <td>
        <input type="text" name="nama_wisata" value="{{old('nama_wisata')}}" >
      </td>
    </tr>
    <tr>
      <td>
        Lokasi Wisata
      </td>
      <td>
        <input type="text" name="lokasi" value="{{old('lokasi')}}">
      </td>
    </tr>
    <tr>
      <td>
        Harga Tiket Wisata
      </td>
      <td>
        <input type="text" name="harga" value="{{old('harga')}}">
      </td>
    </tr>
    <tr>
      <td>
        Gambaran Objek Wisata
      </td>
      <td>
        <input type="text" name="gambar" value="{{old('gambar')}}">
      </td>
    </tr>
    <tr>
      <td>
        Diskripsi Objek Wisata
      </td>
      <td>
        <input type="text" name="deskripsi" value="{{old('deskripsi')}}">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input class="btn btn-primary" type="submit" value="Tambah">
        <a href="/objek-wisata"><button type="button">Kembali</button></a>
      </td>
    </tr>

    </tr>

  </table>
</form>
</body>
</html>
