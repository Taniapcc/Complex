var tabla;
//Función que se ejecuta al inicio
function init() {

    listar();

    $("#ltablas").change(listar);
    mostrarform(false);
    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })
}

function listar() {
    var ltablas = $("#ltablas").val();

    var tabla = $('#listado').DataTable({
        retrieve: true,
        paging: false
    });
    tabla.destroy();

    var tabla = $("#listado").DataTable({
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
            "url": base_url + "/Tablas/listar",
            "data": {
                "ltablas": ltablas
            },
            "type": "get",
            "dataType": "json",
            "dataSrc": ""
        },
        "columns": [{ "data": "idtabla" },
            { "data": "idauxiliares" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "condicion" },
            { "data": "options" }
        ]
    });
}


//Función mostrar formulario
function mostrarform(flag) {
    var obj = document.getElementById("ltablas");
    valTitulo = obj.options[obj.selectedIndex].text;
    val = obj.options[obj.selectedIndex].value;
    document.getElementById("idtabla").value = val;

    document.getElementById("tituloForm").innerHTML = valTitulo;

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

//Función limpiar
function limpiar() {
    $("#nombre").val("");
    $("#descripcion").val("");
    $("#idauxiliares").val("");
    $("#idsubtabla").val("");
}

//Función cancelarform
function cancelarform() {
    limpiar();
    mostrarform(false);
}


function guardaryeditar(e) {

    var ltablas = $("#ltablas").val();
    e.preventDefault(); //No se activará la acción predeterminada del evento

    var nombre = document.querySelector('#nombre').value;
    var descripcion = document.querySelector('#descripcion').value;

    if (nombre == '' || descripcion == '') {
        //alert("faltan llenar datos");
        bootbox.alert("Los datos son requeridos");
        return false;
    }


    $("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        "url": base_url + "/Tablas/setTablas",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function($datos) {
            alert($datos);
            var tabla = $('#listado').DataTable(); // accede de nuevo a la DataTable.
            bootbox.alert("Datos guardados con éxito");
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}


function validaForm() {
    // Campos de texto
    if ($("#nombre").val() == "") {
        alert("El campo Nombre no puede estar vacío.");
        $("#nombre").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if ($("#descripcion").val() == "") {
        alert("El campo Apellidos no puede estar vacío.");
        $("#apellidos").focus();
        return false;
    }
    return true; // Si todo está correcto
}

function mostrar(idauxiliares) {

    $.post(base_url + "/Tablas/mostrar", {
        idauxiliares: idauxiliares
    }, function(data, status) {
        bootbox.alert("mostrar");
        data = JSON.parse(data);
        mostrarform(true);

        $("#idtabla").val(data.idtabla);
        //$('#idtabla').selectpicker('refresh');

        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idauxiliares").val(data.idauxiliares);
        $("#idtabla").val(data.idtabla);
        $("#idsubtabla").val(data.idsubtabla);

    })
}

//Función para desactivar registros
function desactivar(idauxiliares) {
    bootbox.confirm("¿Está Seguro de desactivar la Presentación?", function(result) {
        if (result) {
            $.post(base_url + "/Tablas/desactivar", {
                idauxiliares: idauxiliares
            }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idauxiliares) {
    bootbox.confirm("¿Está Seguro de activar la Presentación?", function(result) {
        if (result) {
            $.post(base_url + "/Tablas/activar", {
                idauxiliares: idauxiliares
            }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}


init();