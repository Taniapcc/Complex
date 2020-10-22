var tabla;

function init() {
    listar();
    // $("#ltabla").change(listar);

    mostrarform(false);
    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })
}

//Función limpiar
function limpiar() {
    $("#nombre").val("");
    $("#descripcion").val("");
    $("#idauxiliares").val("");
}

//Función mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listado").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listado").show();
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
    var ltabla = $("#ltabla").val();
    //alert(ltabla);

    $("#listado").DataTable({
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
            "url": base_url + "/Auxiliares/listar",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idauxiliares" },
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
        url: "../controller/auxiliares.php?op=guardaryeditar",
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

function mostrar(idauxiliares) {

    $.post("../controller/auxiliares.php?op=mostrar", { idauxiliares: idauxiliares }, function(data, status) {
        //bootbox.alert("mostrar");
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idauxiliares").val(data.idauxiliares);

    })
}

//Función para desactivar registros
function desactivar(idauxiliares) {
    bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result) {
        if (result) {
            $.post("../controller/auxiliares.php?op=desactivar", { idauxiliares: idauxiliares }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idauxiliares) {
    bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result) {
        if (result) {
            $.post("../controller/auxiliares.php?op=activar", { idauxiliares: idauxiliares }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function openModal() {
    $('modalFormRol').modal('show');
}

function maskform() {
    $(documento).ready(function() {
        $(selector).inputmask("aa-9999"); // máscara estática 
        $(selector).inputmask({ máscara: "aa-9999" }); // máscara estática 
        $('#prueba').inputmask('(99) 9999 [9] -9999');
    });
}

init();