
// Funcion ajax para cargar en un formulario padre el formulario hijo
function cargar(urlMenu){
   
    $.ajax({
        type: "POST",
        url:urlMenu,
        data:{},
        success: function(datos){
            $('#qCarga').html(datos);
        }
    });
}
// Fin función ajax


// Funcion Guardar

function guardarClientes(){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'nu': $('#nombre').val(),
            'ap': $('#apellidos').val(),
            'gm': $('#correo').val(),
            'tl': $('#telefono').val(),
            'metodo': "g"
        },
        success: function(data){
            alert(data);
            $('#nombre').val('');
            $('#apellidos').val('');
            $('#correo').val('');
            $('#telefono').val('');
            ListarClientes();
        }
    });
}

function guardarProducto(){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'ID_Pro': $('#ProveedorID').val(),
            'ID_Ca': $('#CategoriaID').val(),
            'NombreP': $('#NombreProducto').val(),
            'metodo': "gp"
        },
        success: function(data){
            alert(data);
            $('#ProveedorID').val('');
            $('#CategoriaID').val('');
            $('#NombreProducto').val('');
            ListarProductos();
        }
    });
}

function guardarProveedor(){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'nombreProve': $('#nombre_proveedor').val(),
            'nombreAse': $('#Nombre_Asesor').val(),
            'ciuda': $('#Ciudad').val(),
            'metodo': "gpro"
        },
        success: function(data){
            alert(data);
            $('#nombre_proveedor').val('');
            $('#Nombre_Asesor').val('');
            $('#Ciudad').val('');
            ListarProve();
        }
    });
}

function guardarcategoria(){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'nombreCate': $('#nombre_categoria').val(),
            'metodo': "gcate"
        },
        success: function(data){
            alert(data);
            $('#nombre_categoria').val('');
            ListarCate();
        }
    });
}

function guardarcompra(){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlCliente.php",
        data: {
            'id': $('#IDcli').val(),
            'Fecha': $('#Date').val(),
            'metodo': "gc"
        },
        success: function(data){
            alert(data);
            $('#IDcli').val('');
            $('#Date').val('');
            cargar('ClienteAncheta.php');
        }
    });
}

// Fin Funcion Guardar


// Funcion  Listar 

function ListarClientes(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'metodo': "l"
        },
        datatype:"html",
        success: function(data){
            $('tbody').text("");
            $('tbody').html(data);
        }
    });
}

function Listar2(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'metodo': "x"
        },
        datatype:"html",
        success: function(data){
            $('tbody').text("");
            $('tbody').html(data);
        }
    });
}
function ListarProductos(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'metodo': "p"
        },
        datatype:"html",
        success: function(data){
            $('tbody').text("");
            $('tbody').html(data);
        }
    });
}

function ListarProve(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'metodo': "lp"
        },
        datatype:"html",
        success: function(data){
            $('tbody').text("");
            $('tbody').html(data);
        }
    });
}

function ListarCate(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'metodo': "lca"
        },
        datatype:"html",
        success: function(data){
            $('tbody').text("");
            $('tbody').html(data);
        }
    });
}

function ListarDomicilio(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'metodo': "LD"
        },
        datatype:"html",
        success: function(data){
            $('tbody').text("");
            $('tbody').html(data);
        }
    });
}

function ListarCompras(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlCliente.php",
        data: {
            'metodo': "LC"
        },
        datatype:"html",
        success: function(data){
            $('tbody').text("");
            $('tbody').html(data);
        }
    });
}
// Fin Funcion Listar 


// Funcion opciones Del formulario 

function OpcionesProductos(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'metodo': "op"
        },
        datatype:"html",
        success: function(data){
            $('#ProveedorID').text("");
            $('#ProveedorID').html(data);
        }
    });
}
function OpcionesCategoria(){
    $.ajax({
        type: "POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'metodo': "oc"
        },
        datatype:"html",
        success: function(data){
            $('#CategoriaID').text("");
            $('#CategoriaID').html(data);
        }
    });
}

// Fin Funcion Opciones formulario 


// Funcion Eliminar 

function eliminarCliente(idCliente){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'idCliente': idCliente,
            'metodo': "e"
        },
        success: function(data){
            alert(data);
            ListarClientes();
        }
    });
}

function eliminarProducto(idProducto){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'idProducto': idProducto,
            'metodo': "ep"
        },
        success: function(data){
            alert(data);
            ListarProductos();
        }
    });
}


function eliminarproveedor(idproveedor){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'idproveedor': idproveedor,
            'metodo': "EliminarPro"
        },
        success: function(data){
            alert(data);
            ListarProve();
        }
    });
}


function eliminarcategoria(idcategoria){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'idCatego': idcategoria,
            'metodo': "EliminarCatego"
        },
        success: function(data){
            alert(data);
            ListarCate();
        }
    });
}

function Despachados(idDomicilio){
    $.ajax({
        type:"POST",
        url: "../../controlador/controlAdmin.php",
        data: {
            'idDomi': idDomicilio,
            'metodo': "Ds"
        },
        success: function(data){
            alert(data);
            ListarDomicilio();
        }
    });
}


// Fin Funcion Eliminar 


// Función para cargar en la ventana modal los datos seleccionados

function cargarCliente(id){
    $.ajax({
        data: {
            "idCliente" : id,
            'metodo' : "c"
        },
        url: "../../controlador/controlAdmin.php",
        type:"POST",
        success: function(data){
            $('#cuerpoModificar').text("");
            $('#cuerpoModificar').append(data);
            $("#modalMC").modal("show");
        }
    });
}

function cargarProveedor(id){
    $.ajax({
        data: {
            "idProve" : id,
            'metodo' : "cp"
        },
        url: "../../controlador/controlAdmin.php",
        type:"POST",
        success: function(data){
            $('#CuerpoModificar').text("");
            $('#CuerpoModificar').append(data);
            $("#modalMCC").modal("show");
        }
    });
}



// Fin de Cargar ventana modal //


// Funcion para modificar // 

function ModificarCliente(){
    $.ajax({
        data: {
            "id" : $('#idClienteM').val(),
            "nu" : $('#nombreM').val(),
            "ap" : $('#apellidosM').val(),
            'gm' : $('#correoM').val(),
            'tl' : $('#telefonoM').val(),
            'metodo' : "m"
        },
        url: "../../controlador/controlAdmin.php",
        type:"POST",
        success: function(data){
            alert(data);
            ListarClientes();
            $("#modalMC").modal("hide");
        }
    });
    
}

function ModificarProveedor(){
    $.ajax({
        data: {
            "ID" : $('#ID_Proveedor').val(),
            "NombreP" : $('#nombreproveedorM').val(),
            "NombreA" : $('#NombreAseM').val(),
            'Ciuda' : $('#CiudadM').val(),
            'metodo' : "mp"
        },
        url: "../../controlador/controlAdmin.php",
        type:"POST",
        success: function(data){
            alert(data);
            ListarProve();
            $("#modalMCC").modal("hide");
        }
    });
    
}
// Fin de función modificar  //

