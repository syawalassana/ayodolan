<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
  <form action="/objek-wisata/{{$data->id}}" method="post">
  <input type="hidden" name="_method" value="PUT">
    @csrf
    <table>
    <tr>
      <td>
        Nama Wisata
      </td>
      <td>
        <input type="text" name="nama_wisata" value="{{$data->nama_wisata}}" >
      </td>
    </tr>
    <tr>
      <td>
        Lokasi Wisata
      </td>
      <td>
        <input type="text" name="lokasi" value="{{$data->lokasi}}">
      </td>
    </tr>
    <tr>
      <td>
        Harga Tiket Wisata
      </td>
      <td>
        <input type="text" name="harga" value="{{$data->harga}}">
      </td>
    </tr>
    <tr>
      <td>
        Gambaran Objek Wisata
      </td>
      <td>
      <input type="file" name="gambar">
      </td>
    </tr>
    <tr>
      <td>
        Diskripsi Objek Wisata
      </td>
      <td>
        <input type="text" name="deskripsi" value="{{$data->deskripsi}}">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input class="btn btn-primary" type="submit" value="Update">
        <a href="/objek-wisata"><button type="button">Kembali</button></a>
      </td>
    </tr>

    </tr>
</body>
</html>