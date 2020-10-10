var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })
}

//Función limpiar
function limpiar() {
    $("#nombre").val("");
    $("#descripcion").val("");
    $("#idventa").val("");
}

//Función mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función cancelarform
function cancelarform() {
    limpiar();
    mostrarform(false);
}

//Función Listar
function listar() {
    tabla = $('#tbllistado').dataTable({
        "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
        "aProcessing": true, //Activamos el procesamiento del datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../controller/repartidor.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 5, //Paginación
        "order": [
                [0, "desc"]
            ] //Ordenar (columna,orden)
    }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../controller/venta.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(idventa) {

    $.post("../controller/venta.php?op=mostrar", { idventa: idventa }, function(data, status) {
        //bootbox.alert("mostrar");
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idventa").val(data.idventa);

    })
}

//Función para desactivar registros
function desactivar(idventa) {
    bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result) {
        if (result) {
            $.post("../controller/venta.php?op=desactivar", { idventa: idventa }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para desactivar registros
function entregar(idventa) {

    //bootbox.alert("Entregado ");

    bootbox.confirm("¿Está Seguro de registrar Entrega?", function(result) {
        if (result) {
            $.post("../controller/repartidor.php?op=entregar", { idventa: idventa }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}



function validarForm(e) {
    var x = document.forms["formulario"]["nombre"].value;
    if (x == "") {
        alert("Nombre Requerido");
        error.innerHTML += '<li>Por favor completa el nombre</li>';
        '<div id="e-nombre" class = "errores" > Nombre requerido </div>';
        return false;
    }

    e.preventDefault();
    formulario.addEventListener('submit', validarForm);

}


init();