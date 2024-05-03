<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap Linki -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Nuevo Detalle</title>
</head>
<body>
  
  <div class="p-5 mb-4 text-bg-dark container-fluid">
    <div class="container">
      <h1 class="display-5 fw-bold">Agregar Detalle</h1>
    </div>
  </div>
    <div class="container">
      <div class="card">
          <div class="card-header">
              <span class="text-primary">Datos Detalle</span>
          </div>
          <div class="card-body">
            <form method="POST" class="form-horizontal" action="{{ route('detalles.store') }}">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="invoice_id">invoice:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="invoice_id" name="invoice_id" placeholder="Ingrese invoice id ">
                    </div>
                </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2" for="product_id">Producto:</label>
                      <div class="col-sm-10">
                        <select class="form-select" id="product_id" name="product_id" required>
                            <option selected disabled value="">Seleccione uno...</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="quantity">Cantidad:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Ingrese la cantidad ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="price">Precio:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Ingrese la cantidad ">
                    </div>
                </div>
                  <div class="form-group mt-3">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                          
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>

</body>
</html>