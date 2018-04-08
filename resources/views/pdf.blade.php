<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Product</title>
    <style media="screen">
      table{
        border-collapse: collapse;
      }
      th,td{
        border: 1px solid;
      }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <th>ID</th>
        <th>Nama Product</th>
        <th>Details</th>
        <th>Harga</th>
      </tr>
      @foreach($DetailProduct as $DetailProducts)
      <tr>
        <td>{{$DetailProducts->id}}</td>
        <td>{{$DetailProducts->namaproducts}}</td>
        <td>{{$DetailProducts->deskripsi}}</td>
        <td>{{$DetailProducts->harga}}</td>
      </tr>
      @endforeach
    </table>

  </body>
</html>
