<?php
require_once '../modelo/conexion.php';
$metodo = $_POST['metodo'];

switch ($metodo) {
    case 'g':
        guardar();
        break;
    case 'l':
        listar();
        break;
    case 'e':
        eliminar();
        break;
    case 'x':
        listarVentas();
        break;
    case 'm':
        modificar();
        break;
    case 'c':
        cargar();
        break;
    case 'p':
        ListarProductos();
        break;
    case 'ep':
        eliminarProducto();
        break;
    case 'op':
        OpcionesProductos();
        break;
    case 'oc':
        OpcionesCategoria();
        break;
    case 'gp':
        guardarProductos();
        break;
    case 'lp':
        ListarProveedores();
        break;
    case 'gpro':
        GuardarProveedor();
        break;
    case 'cp':
        CargarProveedores();
        break;
    case 'mp':
        ModificarProve();
        break;
    case 'EliminarPro':
        eliminarProveedor();
        break;
    case 'lca':
        Listarcate();
        break;
    case 'gcate':
        GuardarCateg();
        break;
    case 'EliminarCatego':
        EliminarCategoriaP();
        break;
    case 'LD':
        ListaDomicilios();
        break;
    case 'Ds':
        DespacharDomi();
        break;

}

// En este apartado se encuentran todos los controladores de la vista "Administrar Clientes"
function guardar(){
    $nomCliente = $_POST['nu'];
    $apellidos = $_POST['ap'];
    $correo = $_POST['gm'];
    $telefono = $_POST['tl'];

    if($nomCliente == "" || $apellidos == "" || $correo == "" || $telefono == ""){
        echo "Llena todos los campos del formulario";
    }else{
        $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "INSERT INTO tblclientes  
        (ID_Cliente, Nombre, Apellido, Correo, Numero_Celular)
        VALUES
        (null,'".$nomCliente."', '".$apellidos."','".$correo."','".$telefono."')";

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Cliente Guardado Correctamente";
    }else{
        echo "No fué posible guardar el Cliente";
    }
    }
}

function listar(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = "SELECT * FROM `tblclientes` WHERE estado = 1 ORDER BY ID_Cliente DESC";

    $lista = $conexion->getData($consultaSQL);

    $tabla = "";

    $parametros = array();

    foreach ($lista as $key => $value) {
        $tabla .= '<tr>
                    <th scope="row">'.$value['ID_Cliente'].'</th>
                    <td>'.$value['Nombre'].'</td>
                    <td>'.$value['Apellido'].'</td>
                    <td>'.$value['Correo'].'</td>
                    <td>'.$value['Numero_Celular'].'</td>
                    <td><input type="button" value="Modificar" class="btn btn-warning" onclick="cargarCliente('.$value['ID_Cliente'].');" ></td>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminarCliente('.$value['ID_Cliente'].')"></td>
                </tr>';  
    }
    echo $tabla;
}

function eliminar(){
    $idCliente = $_POST['idCliente'];
    $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "UPDATE tblclientes SET estado = 0 where ID_Cliente = ".$idCliente;

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Cliente Eliminado Correctamente";
    }else{
        echo "No fué posible eliminar el cliente";
    }
}

function cargar(){
    $conexion = new PDODB();

    $conexion->connect();

    $ID_Cliente= $_POST['idCliente'];

    $consultaSQL = "SELECT * FROM `tblClientes` WHERE ID_Cliente = ".$ID_Cliente;

    $ConsultaModal = $conexion->getData($consultaSQL);

    $TablaModal = "";

    foreach ($ConsultaModal as $key => $value) {
        $TablaModal .= '<div class="col">
                        <div class="form-group row">
                        <div class="col">
                            <label for="nombres">Nombres</label>
                            <input type="hidden" name="idClienteM" id="idClienteM" value="'.$value['ID_Cliente'].'">
                            <input type="text" name="nombresM" class="form-control" value="'.$value['Nombre'].'" id="nombreM" required>
                        </div>
                        <div class="col">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidosM" class="form-control" value="'.$value['Apellido'].'" id="apellidosM" required>
                        </div>
                        <div class="col">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" name="correoM" class="form-control" value="'.$value['Correo'].'" id="correoM" required>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col">
                            <label for="telefono">Teléfono</label>
                            <input type="number" name="telefonoM" class="form-control" value="'.$value['Numero_Celular'].'" id="telefonoM" required>
                        </div>
                        </div>
                    </div>';  
    }
    echo $TablaModal;
}

function modificar(){

    $ID_Cliente = $_POST['id'];
    $nomCliente = $_POST['nu'];
    $apellidos = $_POST['ap'];
    $correo = $_POST['gm'];
    $telefono = $_POST['tl'];
   
    
    if($nomCliente == "" || $apellidos == "" || $correo == "" || $telefono == ""){
        echo "Llena todos los campos del formulario";
    }else{

    $conexion = new PDODB();
    $conexion->connect();
    
    $consultaSQL = "UPDATE `tblclientes` SET `Nombre` = '".$nomCliente."', `Apellido` = '".$apellidos."', `Correo` = '".$correo."', `Numero_Celular` = '".$telefono."' WHERE `tblclientes`.`ID_Cliente` = ".$ID_Cliente.";";

    $modificado = $conexion->executeInstruction($consultaSQL);
    
    if($modificado){
        echo "Modificado Correctamente";

    }else{
        echo "No fué posible modificar";
    }
    }
}
//-- Fin de controladores de la vista "Administrar Clientes"--------------------------------------------------//


//-- Controladores de la vista "Historial Ventas"-------------------------------------------------------------//
function listarVentas(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = 'SELECT v.ID_VENTA, v.Cantidad, f.Fecha,concat("$ ",format((a.PrecioUnitario),2))as PrecioUnitario, ca.Nombre_CatAncheta, 
    concat(cl.Nombre," ",cl.Apellido) nombreCliente, concat("$ ",format((v.Cantidad * a.PrecioUnitario),2)) as Subtotal FROM tblventas v 
        inner join tblfacturas f on(v.ID_FACTURA = f.ID_Factura) 
        inner JOIN tblanchetas a on(v.ID_ANCHETA = a.ID_Ancheta) 
        inner join tblcategorias_anchetas ca on(a.ID_Categoria_Ancheta = ca.ID_Categoria_Ancheta) 
        inner join tblclientes cl on(f.ID_Cliente = cl.ID_Cliente) ORDER BY ID_Venta DESC';

    $lista2 = $conexion->getData($consultaSQL);

    $tabla2 = "";

    foreach ($lista2 as $key => $value) {
        $tabla2 .= '<tr>
                    <th scope="row">'.$value['ID_VENTA'].'</th>
                    <td>'.$value['Fecha'].'</td>
                    <td>'.$value['Cantidad'].'</td>
                    <td>'.$value['PrecioUnitario'].'</td>
                    <td>'.$value['Nombre_CatAncheta'].'</td>
                    <td>'.$value['nombreCliente'].'</td>
                    <td>'.$value['Subtotal'].'</td>
                </tr>';  
    }
    echo $tabla2;
}
//-- Fin de controladores de la vista "Historial Ventas"------------------------------------------------------//


//-- Controladores de la vista "Lista De Productos"-----------------------------------------------------------//

function OpcionesProductos(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = "SELECT ID_Proveedor,Nombre_proveedor  FROM `tblproveedores` WHERE 1";

    $lista = $conexion->getData($consultaSQL);

    $tablaO = "";

    foreach ($lista as $key => $value) {
        $tablaO .=  '<option id="">'.$value['ID_Proveedor'].'. '.$value['Nombre_proveedor'].'</option>';
                   
    }
    echo $tablaO;
}

function OpcionesCategoria(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = "SELECT ID_CategoriaProducto,NombreCategoria FROM `tblcategoria_producto` WHERE 1";

    $lista = $conexion->getData($consultaSQL);

    $tablaCT = "";

    foreach ($lista as $key => $value) {
        $tablaCT .=  '<option id="">'.$value['ID_CategoriaProducto'].'. '.$value['NombreCategoria'].'</option>';
                   
    }
    echo $tablaCT;
}

function guardarProductos(){
    $IDproveedor = $_POST['ID_Pro'];
    $IDcategoria = $_POST['ID_Ca'];
    $NombrePro = $_POST['NombreP'];
   
    if($IDproveedor == "" || $IDcategoria == "" || $NombrePro == "" ){
        echo "Llena todos los campos del formulario";
    }else{
        $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "INSERT INTO tblproductos  
        (ID_Producto, ID_Proveedor, ID_CategoriaProducto, NombreProducto)
        VALUES
        (null,'".$IDproveedor."', '".$IDcategoria."','".$NombrePro."')";

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Producto Guardado Correctamente";
    }else{
        echo "No fué posible guardar el Producto";
    }
    }
}

function ListarProductos(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = 'SELECT p.ID_Producto, v.Nombre_proveedor, c.NombreCategoria, p.NombreProducto  FROM tblproductos p
                    INNER JOIN tblproveedores v ON (p.ID_Proveedor = v.ID_Proveedor)
                    INNER JOIN tblcategoria_producto c ON (p.ID_CategoriaProducto = c.ID_CategoriaProducto)
                    WHERE p.estado=1
                    ORDER BY ID_Producto DESC';

    $lista = $conexion->getData($consultaSQL);

    $tablaP = "";

    foreach ($lista as $key => $value) {
        $tablaP .= '<tr>
                    <th scope="row">'.$value['ID_Producto'].'</th>
                    <td>'.$value['Nombre_proveedor'].'</td>
                    <td>'.$value['NombreCategoria'].'</td>
                    <td>'.$value['NombreProducto'].'</td>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminarProducto('.$value['ID_Producto'].')"></td>
                </tr>';  
    }
    echo $tablaP;
}

function eliminarProducto(){
    $idProducto = $_POST['idProducto'];
    $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "UPDATE tblproductos SET estado = 0 where ID_Producto = ".$idProducto;

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Producto Eliminado Correctamente";
    }else{
        echo "No fué posible eliminar el Producto";
    }
}

//-- Fin de controladores de la vista "Lista De Productos"----------------------------------------------------//


//-- Controladores de la vista "Proveedores"------------------------------------------------------------------//

function GuardarProveedor(){
    $nomProve = $_POST['nombreProve'];
    $nombreAse = $_POST['nombreAse'];
    $ciudad = $_POST['ciuda'];
    
    if($nomProve == "" || $nombreAse == "" || $ciudad == ""){
        echo "Llena todos los campos del formulario";
    }else{
        $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "INSERT INTO tblproveedores  
        (ID_Proveedor, Nombre_proveedor, Nombre_Asesor, Ciudad)
        VALUES
        (null,'".$nomProve."', '".$nombreAse."','".$ciudad."')";

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Proveedor Guardado Correctamente";
    }else{
        echo "No fué posible guardar el Proveedor";
    }
    }
}

function ListarProveedores(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = "SELECT * FROM `tblproveedores` WHERE estado = 1 ORDER BY ID_Proveedor DESC";

    $lista = $conexion->getData($consultaSQL);

    $tabla8 = "";

    foreach ($lista as $key => $value) {
        $tabla8 .= '<tr>
                    <th scope="row">'.$value['ID_Proveedor'].'</th>
                    <td>'.$value['Nombre_proveedor'].'</td>
                    <td>'.$value['Nombre_Asesor'].'</td>
                    <td>'.$value['Ciudad'].'</td>
                    <td><input type="button" value="Modificar" class="btn btn-warning" onclick="cargarProveedor('.$value['ID_Proveedor'].');" ></td>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminarproveedor('.$value['ID_Proveedor'].')"></td>
                </tr>';  
    }
    echo $tabla8;
}

function CargarProveedores(){
    $conexion = new PDODB();

    $conexion->connect();

    $ID_Proveedor= $_POST['idProve'];

    $consultaSQL = "SELECT * FROM `tblproveedores` WHERE ID_Proveedor = ".$ID_Proveedor;

    $ConsultaModal = $conexion->getData($consultaSQL);

    $TablaModal2 = "";

    foreach ($ConsultaModal as $key => $value) {
        $TablaModal2 .= '<div class="col">
                            <div class="form-group row">
                            <div class="col">
                            <label for="Nombre Del Proveedor">Nombre Del Proveedor</label>
                            <input type="hidden" name="idClienteM" id="ID_Proveedor" value="'.$value['ID_Proveedor'].'">
                            <input type="text" name="nombresM" class="form-control" value="'.$value['Nombre_proveedor'].'" id="nombreproveedorM" required>
                        </div>
                        <div class="col">
                            <label for="Nombre Del Asesor">Nombre Del Asesor</label>
                            <input type="text" name="apellidosM" class="form-control" value="'.$value['Nombre_Asesor'].'" id="NombreAseM" required>
                        </div>
                        <div class="col">
                            <label for="Ciudad">Ciudad</label>
                            <input type="email" name="correoM" class="form-control" value="'.$value['Ciudad'].'" id="CiudadM" required>
                        </div>
                        </div>
                    </div>';  
    }
    echo $TablaModal2;
}

function ModificarProve(){

    $ID_Prove = $_POST['ID'];
    $nomProve = $_POST['NombreP'];
    $nomAse = $_POST['NombreA'];
    $Ciudad = $_POST['Ciuda'];
   
   
    
    if($nomProve == "" || $nomAse == "" || $Ciudad == "" ){
        echo "Llena todos los campos del formulario";
    }else{

    $conexion = new PDODB();
    $conexion->connect();
    
    $consultaSQL = "UPDATE `tblproveedores` SET `Nombre_proveedor` = '".$nomProve."', `Nombre_Asesor` = '".$nomAse."', `Ciudad` = '".$Ciudad."' WHERE `tblproveedores`.`ID_Proveedor` = ".$ID_Prove.";";

    $modificado = $conexion->executeInstruction($consultaSQL);
    
    if($modificado){
        echo "Modificado Correctamente";

    }else{
        echo "No fué posible modificar";
    }
    }
}

function eliminarProveedor(){
    $id_Proveedor = $_POST['idproveedor'];
    $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "UPDATE tblproveedores SET estado = 0 where ID_Proveedor = ".$id_Proveedor;

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Cliente Eliminado Correctamente";
    }else{
        echo "No fué posible eliminar el cliente";
    }
}

//-- Fin de controladores de la vista "Proveedores"----------------------------------------------------------//


//-- Controlador de la vista "Categoria Producto"-----------------------------------------------------------//

function GuardarCateg(){
    $nomCate = $_POST['nombreCate'];
    
    if($nomCate == "" ){
        echo "Llena todos los campos del formulario";
    }else{
        $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "INSERT INTO tblcategoria_producto  
        (ID_CategoriaProducto, NombreCategoria)
        VALUES
        (null,'".$nomCate."')";

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Categoria Guardada Correctamente";
    }else{
        echo "No fué posible guardar La categoria";
    }
    }
}

function Listarcate(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = "SELECT * FROM tblcategoria_producto WHERE estado = 1 ORDER BY ID_CategoriaProducto DESC;";

    $lista = $conexion->getData($consultaSQL);

    $tabla = "";

    foreach ($lista as $key => $value) {
        $tabla .= '<tr>
                    <th scope="row">'.$value['ID_CategoriaProducto'].'</th>
                    <td>'.$value['NombreCategoria'].'</td>
                    <td><input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminarcategoria('.$value['ID_CategoriaProducto'].')"></td>
                </tr>';  
    }
    echo $tabla;
}


function EliminarCategoriaP(){
    $id_Categoria = $_POST['idCatego'];
    $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "UPDATE tblcategoria_producto SET estado = 0 where ID_CategoriaProducto = ".$id_Categoria;

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Categoria Eliminada Correctamente";
    }else{
        echo "No fué posible eliminar la categoria";
    }
}

//-- Fin "Categoria Producto"------------------------------------------------------------------------------//


//-- Controlador de la vista "Domicilios"------------------------------------------------------------------//

function ListaDomicilios(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = 'SELECT d.ID_Domicilio,concat(c.Nombre," ",c.Apellido)NombreCliente,d.Barrio, d.Direccion,d.Telefono 
                    FROM tbldomicilios d
                    INNER JOIN tblfacturas f ON (d.ID_Factura = f.ID_Factura)
                    INNER JOIN tblclientes c ON (f.ID_Cliente = c.ID_Cliente)
                    WHERE d.estado = 1 ORDER BY ID_Domicilio DESC;';

    $lista = $conexion->getData($consultaSQL);

    $tabla = "";

    foreach ($lista as $key => $value) {
        $tabla .= '<tr>
                    <th scope="row">'.$value['ID_Domicilio'].'</th>
                    <td>'.$value['NombreCliente'].'</td>
                    <td>'.$value['Barrio'].'</td>
                    <td>'.$value['Direccion'].'</td>
                    <td>'.$value['Telefono'].'</td>
                    <td><input type="button" value="Despachado" class="btn btn-success" onclick="Despachados('.$value['ID_Domicilio'].')"></td>
                </tr>';  
    }
    echo $tabla;
}

function DespacharDomi(){
    $id_Domicilio = $_POST['idDomi'];
    $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "UPDATE tbldomicilios SET estado = 0 where ID_Domicilio = ".$id_Domicilio;

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "El domicilio se encuentra en proceso para ser despachado";
    }else{
        echo "No fue posible despachar el domicilio";
    }
}

//-- Fin "Domicilios"--------------------------------------------------------------------------------------//
?>