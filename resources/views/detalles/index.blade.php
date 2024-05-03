<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bostrap --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Detalles</title>

</head>
<body>
    <div class="container">
        <h1>Listado de Detalles</h1>
         <a href="{{ route('detalles.create') }}" class="btn btn-dark" style="margin-bottom: 1%">Nuevo</a> 
        <table class="table table-dark table-striped" style="margin-bottom: 7%">
            <thead>
              <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Invoice</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detalles as $detalle)
              <tr>
                <th scope="row">{{ $detalle->id }}</th>
                <td>{{ $detalle->invoice_id }}</td>
                <td>{{ $detalle->product_name }}</td>
                <td>{{ $detalle->quantity }}</td>
                <td>{{ $detalle->price }}</td>
                <td>
                  <a href="{{ route('detalles.edit', ['detalle'=>$detalle->id]) }}"
                    class="btn btn-secondary">Editar</a>
                    <form action="{{ route('detalles.destroy', ['detalle' => $detalle->id]) }}"
                      method='POST' style="display:inline-block">
                      @method('delete')
                      @csrf
                      <input class="btn btn-danger" type="submit" value="Eliminar">
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

    </div>
</body>
</html>