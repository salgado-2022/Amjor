<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <link rel="stylesheet" href="../../modelo/assets/css/style.css">
         <link rel="stylesheet" type="text/css" href="../../modelo/assets/css/styles2.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <form class="box" action="sesion.php" method="post">
            <h1>Registro</h1>
            <hr>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" name="nombres" class="form-control" placeholder="NOMBRES">
                        </div>
                        <div class="col">  
                            <input type="text" name="apellidos" class="form-control" placeholder="APELLIDOS">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="CORREO">
                        </div>
                        <div class="col">
                            <input type="tel" name="tel" class="form-control" placeholder="TELÉFONO">
                        </div>
                    </div>
                </div>
            </div>   
        </div>
            <input type="submit" name="" value="REGISTRARSE">
            
        </form>
    </body>
</html>