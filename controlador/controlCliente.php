<?php
require_once '../modelo/conexion.php';
$metodo = $_POST['metodo'];

switch ($metodo) {

    case 'gc':
        Guardar();
        break;
    case 'LC':
        ListarFactura();
        break;
    
   
}

function Guardar(){
    $ID_cliente = $_POST['id'];
    $Fech = $_POST['Fecha'];
    

    if($ID_cliente == "" || $Fech == ""){
        echo "Llena todos los campos del formulario";
    }else{
        $conexion = new PDODB();

        $conexion->connect();

        $InstruccionSQL = "INSERT INTO tblfacturas  
        (ID_Factura, ID_Cliente, Fecha)
        VALUES
        (null,'".$ID_cliente."', '".$Fech."')";

        $resultado = $conexion->executeInstruction($InstruccionSQL);

    if($resultado == true){
        echo "Compra iniciada";
    }else{
        echo "No fue posible iniciar la compra";
    }
    }
}

function ListarFactura(){
    
    $conexion = new PDODB();

    $conexion->connect();

    $consultaSQL = 'SELECT f.ID_Factura, concat(c.Nombre," ",c.Apellido)NombreCliente,f.Fecha FROM tblfacturas f
                    INNER JOIN tblclientes c ON (f.ID_Cliente = c.ID_Cliente)
                    ORDER BY f.Fecha DESC';

    $lista = $conexion->getData($consultaSQL);

    $tabla8 = "";

    foreach ($lista as $key => $value) {
        $tabla8 .= '<tr>
                    <th scope="row">'.$value['ID_Factura'].'</th>
                    <td>'.$value['NombreCliente'].'</td>
                    <td>'.$value['Fecha'].'</td>
                </tr>';  
    }
    echo $tabla8;
}




?>