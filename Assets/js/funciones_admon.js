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
    $("#idrol").val("");
}

//Función mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoAdmin").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoAdmin").show();
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

    $("#listadoAdmin").DataTable({
        "aprocessing": true,
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 75, 100],
        "buttons": ['excel', 'pdf', 'copy'],
        "ajax": {
            "url": base_url + "/Roles/listar",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idrol" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "condicion" },
            { "data": "options" }
        ]
    });
}
//Función para guardar o editar

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../controller/categoria.php?op=guardaryeditar",
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

function mostrar(idrol) {

    $.post("../controller/categoria.php?op=mostrar", { idcategoria: idrol }, function(data, status) {
        //bootbox.alert("mostrar");
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idcategoria").val(data.idcategoria);

    })
}

//Función para desactivar registros
function desactivar(idrol) {
    bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result) {
        if (result) {
            $.post("../controller/categoria.php?op=desactivar", { idcategoria: idcategoria }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idrol) {
    bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result) {
        if (result) {
            $.post("../controller/categoria.php?op=activar", { idcategoria: idcategoria }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function openModal() {
    $('modalFormRol').modal('show');
}

init();