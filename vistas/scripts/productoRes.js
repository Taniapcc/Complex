var tabla;

//Función que se ejecuta al inicio
function init() {

    listar();
    //Cargamos los items al select Categoria

    $.post("../controller/productoRes.php?op=selectCategoria", function(r) {
        $("#lcategoria").html(r);
        $('#lcategoria').selectpicker('refresh');
    });

    $("#lcategoria").change(listar);

    // listar();

    mostrarform(false);

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })

    //Cargamos los items al select Categoria
    $.post("../controller/productoRes.php?op=selectCategoria", function(r) {
        $("#idcategoria").html(r);
        $('#idcategoria').selectpicker('refresh');
    });

    //Cargamos los items al select Presentacion
    $.post("../controller/productoRes.php?op=selectPresentacion", function(r) {
        $("#idpresentacion").html(r);
        $('#idpresentacion').selectpicker('refresh');
    });

    //Cargamos los items al select Medida
    $.post("../controller/productoRes.php?op=selectMedida", function(r) {
        $("#idmedida").html(r);
        $('#idmedida').selectpicker('refresh');
    });

    $("#imagenmuestra").hide();
    //  $('#mAlmacen').addClass("treeview active");
    //  $('#lArticulos').addClass("active");
}

//Función limpiar
function limpiar() {
    $("#codigo").val("");
    $("#nombre").val("");
    $("#precio").val("");
    $("#descripcion").val("");
    $("#imagenmuestra").attr("src", "");
    $("#imagenactual").val("");
    $("#print").hide();
    $("#idproducto").val("");
    $("#idpresentacion").val("");
    $("#idmedida").val("");
    $("#stock").val("");

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
    var lcategoria = $("#lcategoria").val();
    tabla = $('#tbllistado').dataTable({
        "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
        "aProcessing": true, //Activamos el procesamiento del datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../controller/productoRes.php?op=listar',
            data: { lcategoria: lcategoria },
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
                "copyTitle": "Tabla Copiada",
                "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
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
        url: "../controller/productoRes.php?op=guardaryeditar",
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


function mostrar(idproducto) {

    $.post("../controller/productoRes.php?op=mostrar", { idproducto: idproducto }, function(data, status) {
        //bootbox.alert("mostrar" );
        data = JSON.parse(data);
        mostrarform(true);

        $("#idcategoria").val(data.idcategoria);
        $('#idcategoria').selectpicker('refresh');

        $("#idpresentacion").val(data.idpresentacion);
        $('#idpresentacion').selectpicker('refresh');

        $("#idmedida").val(data.idmedida);
        $('#idmedida').selectpicker('refresh');

        $("#codigo").val(data.codigo);
        $("#nombre").val(data.nombre);
        $("#precio").val(data.precio);
        $("#descripcion").val(data.descripcion);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src", "../files/productos/" + data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#idproducto").val(data.idproducto);
        $("#stock").val(data.stock);
        generarbarcode();

    })
}

//Función para desactivar registros
function desactivar(idproducto) {
    bootbox.confirm("¿Está Seguro de desactivar el Producto?", function(result) {
        if (result) {
            $.post("../controller/productoRes.php?op=desactivar", { idproducto: idproducto }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idproducto) {
    bootbox.confirm("¿Está Seguro de activar la Producto?", function(result) {
        if (result) {
            $.post("../controller/productoRes.php?op=activar", { idproducto: idproducto }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function generarbarcode() {
    codigo = $("#codigo").val();
    JsBarcode("#barcode", codigo);
    $("#print").show();
}

//Función para imprimir el Código de barras
function imprimir() {
    $("#print").printArea();
}

init();