<!-- Main content -->
<div class="card">
  <br>
  <div class="card-header">
    <h1 class="card-title">Administrar Clientes</h1>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="form-group row">
          <div class="col">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="nombre" required>
          </div>
          <div class="col">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" id="apellidos" required>
          </div>
          <div class="col">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" class="form-control" id="correo" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col">
            <label for="telefono">Teléfono</label>
            <input type="number" name="telefono" class="form-control" id="telefono" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col">
            <button class="btn btn-success" onclick="guardarClientes()">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="card-header">
      <h3 class="card-title">Tabla con datos de clientes</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID_Cliente</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Numero_Celular</th>
                <th scope="col">Modificar</th>
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

<!-- Modal -->
<div class="modal fade" id="modalMC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row" id="cuerpoModificar">
      
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="ModificarCliente()">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    ListarClientes();
  });
</script>