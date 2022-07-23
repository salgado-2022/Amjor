<?php

require_once '../modelo/conexion.php';

    $CorreoLogin = $_POST['correo'];
    $Contrasena = $_POST['contrasena'];

    $conexion = new PDODB();
    $conexion->connect();

    $consultaSQL = "SELECT * FROM tblclientes WHERE Correo ='".$CorreoLogin."' and Contrasena ='".$Contrasena."'";
     
    $resultado = $conexion->login($consultaSQL);

    if($resultado != false){
        session_start();
        foreach ($resultado as $key => $value) {
           $_SESSION['ID_Cliente'] = $value['ID_Cliente'];
           $_SESSION['Nombre'] = $value['Nombre'];
           $_SESSION['Apellido'] = $value['Apellido'];
           $_SESSION['UserType'] = $value['UserType'];
        }
        if($_SESSION['UserType']=="Ad"){
            header("location: ./../vista/VistaAdmin/Admin.php");
        }else{
            header("location: ./../vista/VistaCliente/Cliente.php");
        }
   
    }else{
        header("location: ./../vista/Default/sesion.php");
    }

?>