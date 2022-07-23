<?php

session_start();

session_destroy();

header("location: ../vista/Default/sesion.php");

?>