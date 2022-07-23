<!-- Main content -->
<div class="card">
  <br>
  <div class="card-header">
    <h1 class="card-title">Categoria Productos</h1>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="form-group row">
          <div class="col-6">
            <label for="nombres">Nombre Del La Nueva Categoria</label>
            <input type="text" name="nombres" class="form-control" id="nombre_categoria" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col">
            <button class="btn btn-success" onclick="guardarcategoria()">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="card-header">
      <h3 class="card-title">Tabla con las categorias de los productos</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID Categoria Producto</th>
                <th scope="col">Nombre de la categoria</th>
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
    ListarCate();
  });
</script>