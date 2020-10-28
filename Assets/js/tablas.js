var tabla;

//Función que se ejecuta al inicio
function init() {

    listar();

    /*  $.post("../controller/tablas.php?op=selectTabla", function(r) {
          $("#idtabla").html(r);
          $('#idtabla').selectpicker('refresh');
      });

      //Cargamos los items al select Tablas
      $.post("../controller/tablas.php?op=selectTabla", function(r) {
          $("#ltabla").html(r);
          $('#ltabla').selectpicker('refresh');
      });*/

    $("#ltablas").change(listar);

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
    //$("#idtabla").val("");
    $("#idsubtabla").val("");
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
function listarMal() {
    var ltablas = $("#ltablas").val();

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
            "url": "" + base_url + "/Tablas/listar",
            data: { ltablas: ltablas },
            "dataSrc": "",
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

function listar() {
    var ltablas = $("#ltablas").val();
    alert(ltablas);

    var table = $('#listado').DataTable({ retrieve: true, paging: false });
    table.destroy();

    var table = $("#listado").DataTable({
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
            "data": { "ltablas": ltablas },
            "type": "get",
            "dataType": "json",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idtabla" },
            { "data": "idauxiliares" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "condicion" },
            { "data": "options" }
        ]
    });
}



function guardaryeditar(e) {

    var ltabla = $("#ltabla").val();

    e.preventDefault(); //No se activará la acción predeterminada del evento

    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../controller/tablas.php?op=guardaryeditar",
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

    $.post("../controller/tablas.php?op=mostrar", { idauxiliares: idauxiliares }, function(data, status) {
        bootbox.alert("mostrar");
        data = JSON.parse(data);
        mostrarform(true);

        $("#idtabla").val(data.idtabla);
        $('#idtabla').selectpicker('refresh');

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
            $.post("../controller/tablas.php?op=desactivar", { idauxiliares: idauxiliares }, function(e) {
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
            $.post("../controller/tablas.php?op=activar", { idauxiliares: idauxiliares }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();