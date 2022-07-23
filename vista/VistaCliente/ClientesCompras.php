<!-- Main content -->
<div class="card">
  <br>
  <div class="card-header">
    <h1 class="card-title">Crear Factura</h1>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="form-group row">
          <div class="col">
            <label for="ID">ID Cliente</label>
            <input type="text" name="nombres" class="form-control" id="IDcli" required>
          </div>
          <div class="col">
            <label for="Fecha">Fecha de la comprá</label>
            <input type="date" name="apellidos" class="form-control" id="Date" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col">
            <button class="btn btn-success" onclick="guardarcompra()">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="card-header">
      <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID Factura</th>
                <th scope="col">Nombre Del Cliente</th>
                <th scope="col">Fecha de comprá</th>
               
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

<div class="modal fade" id="modalCC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row" id="CuerpoCompra">
      
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="a()">Realizar Comprá</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    ListarCompras();
  });
</script>