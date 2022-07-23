<!-- Main content -->
<div class="card">
  <br>
  <div class="card-header">
    <h1 class="card-title">Productos</h1>
  </div>
  <br>
  <div class="container">
  <div class="row">
      <div class="col">
        <div class="form-group row">
          <div class="col">
            <label for="nombres">ID Proveedor</label>
            <select class="form-control" id="ProveedorID">
            </select>
          </div>
          <div class="col">
            <label for="Categoria_Producto">ID Categoria Del Producto</label>
            <select class="form-control" id="CategoriaID">
            
            </select>
          </div>
          <div class="col">
            <label for="Nombre_Producto">Nombre Del Producto</label>
            <input type="text" name="correo" class="form-control" id="NombreProducto" required>
          </div>
        </div>

        <div class="form-group row">
          <div class="col">
            <button class="btn btn-success" onclick="guardarProducto()">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <table class="table table-striped">
            <thead>
              <tr>
              <th scope="col">ID Producto</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Categoria Del Producto</th>
                <th scope="col">Nombre Del Producto</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>

        </div>
      </div>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.content -->
</div>



<script>
  $(document).ready(function(){
    ListarProductos();
    OpcionesProductos();
    OpcionesCategoria();
  });
</script>

