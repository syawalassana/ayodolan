<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Objek Wisata</title>
  </head>
  <body>
    <a href="/objek-wisata/create"> Tambah Data</a>

    <table border="1">


      <tr>
        <th>
          nama wisata
        </th>
        <th>
          lokasi
        </th>
        <th>
          harga
        </th>
        <th>
          gambar
        </th>
      <th>
        Diskripsi
      </th>
      <th>OPSI</th>


      </tr>

        @foreach ($data as $row) <!-- -->
        <tr>
          <td>
            {{$row -> nama_wisata}}
          </td>
          <td>
            {{$row -> lokasi}}
          </td>
          <td>
            {{$row -> harga}}
          </td>
          <td>
            <img width="500" src="/objekwisata/{{$row -> gambar }}"/>
          </td>
          <td>{{$row -> deskripsi}}</td>
          <td><a href="/objek-wisata/{{$row->id}}/edit">Update</a></td>
            <td>
            <form onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" action="/objek-wisata/{{$row->id}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
            
            </td
        </tr>



        @endforeach
    </table>
    <tr>

    </tr>
  </body>
</html>
