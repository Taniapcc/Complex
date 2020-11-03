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

function fileInput() {
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
}

function listar() {
    var ltablas = $("#ltablas").val();

    //alert(ltablas);

    var tabla = $('#listado').DataTable({
        retrieve: true,
        paging: false
    });
    tabla.destroy();

    var tabla = $("#listado").DataTable({
        "aprocessing": true,
        "aServerSide": true, //Paginación y filtrado realizados por el servidor

        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 75, 100],
        "buttons": ['excel', 'pdf', 'copy'],
        "ajax": {
            "url": base_url + "/Productos/listar",
            "data": {
                "ltablas": ltablas
            },
            "type": "get",
            "dataType": "json",
            "dataSrc": ""
        },
        "columns": [{
                "data": "options"
            },
            {
                "data": "idproducto"
            },
            {
                "data": "nombre"
            },
            {
                "data": "presentacion"
            },
            {
                "data": "tamanio"
            },
            {
                "data": "medida"
            },

            {
                "data": "precio"
            },
            {
                "data": "stock"
            },
            {
                "data": "imagen"
            },
            {
                "data": "condicion"
            }



        ]
    });
}


//https: / / datatables.net / extensions / buttons /

//Función mostrar formulario
function mostrarform(flag) {
    var obj = document.getElementById("ltablas");
    valTitulo = obj.options[obj.selectedIndex].text;
    val = obj.options[obj.selectedIndex].value;
    document.getElementById("idcategoria").value = val;
    document.getElementById("tituloForm").innerHTML = valTitulo;


    if (flag) {
        // 
        //document.getElementById("tituloForm").innerHTML = "Actualizar " + valTitulo; 
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();

    } else {
        //limpiar();

        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función limpiar
function limpiar() {
    $("#nombre").val("");
    $("#descripcion").val("");
    $("#idproducto").val("");
    $("#idcategoria").val("");
    $("#precio").val(0);
    $("#descuento").val(0);
    $("#iva").val(0);

    $("#imagenmuestra").attr("src", "");
    $("#imagenactual").val("");

}

//Función cancelarform
function cancelarform() {
    limpiar();
    mostrarform(false);
}


function guardaryeditar(e) {


    var ltablas = $("#ltablas").val();
    e.preventDefault(); //No se activará la acción predeterminada del evento

    var idproducto = document.querySelector('#idproducto').value;
    var idcategoria = document.querySelector('#idcategoria').value;
    var idpresentacion = document.querySelector('#lpresentacion').value;
    var idmedida = document.querySelector('#lmedidas').value;
    var tamanio = document.querySelector('#tamanio').value;
    var nombre = document.querySelector('#nombre').value;
    var precio = document.querySelector('#precio').value;
    var descuento = document.querySelector('#descuento').value;
    var costoe = document.querySelector('#costoe').value;
    var iva = document.querySelector('#iva').value;
    var stock = document.querySelector('#stock').value;
    var descripcion = document.querySelector('#descripcion').value;
    var imagen = document.querySelector('#imagen').value;


    if (nombre == '' || descripcion == '') {
        //alert("faltan llenar datos");
        bootbox.alert("Nombre y Descripcion son requeridos");
        return false;
    }

    if (precio < 0 || descuento < 0 || costoe < 0 || iva < 0) {
        //alert("faltan llenar datos");
        bootbox.alert("Precio, descuento, costo envio e IVA deben ser mayor que cero");
        return false;
    }


    $("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        "url": base_url + "/Productos/setProductos",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data, status) {
            var tabla = $('#listado').DataTable(); // accede de nuevo a la DataTable.
            bootbox.alert(data);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}

function fnEditar() {
    var btnTablas = document.querySelectorAll(".btnTablas");

    btnTablas.forEach(function(btnTablas) {
        btnTablas.addEventListener('click', function() {
            var id = this.getAttribute("rl");
            var formData = new FormData($("#formulario")[0]);

            var jqxhr = $.post(base_url + "/Productos/getTabla/" + id, function(data, status) {
                mostrarform(true);
                // alert("success");
                $("#idproducto").val(data.idproducto);
                $("#idcategoria").val(data.idcategoria)
                $("#idpresentacion").val(data.idpresentacion);
                $("#idmedida").val(data.idmedida);
                $("#tamanio").val(data.tamanio);
                $("#nombre").val(data.nombre);
                $("#precio").val(data.precio);
                $("#descuento").val(data.descuento);
                $("#costoe").val(data.costoEnvio);
                $("#iva").val(data.IVA);
                $("#stock").val(data.stock);
                $("#descripcion").val(data.descripcion);
                //$("#imagen").val(data.imagen);

                $("#imagenmuestra").show();
                $("#imagenmuestra").attr("src", "../Assets/img/upload/productos/" + data.imagen);
                $("#imagenactual").val(data.imagen);

            }, "json")
        });
    });
}



function desactivar() {
    var btnEliminar = document.querySelectorAll(".btnEliminar");
    btnEliminar.forEach(function(btnEliminar) {
        btnEliminar.addEventListener('click', function() {
            var id = btnEliminar.getAttribute("rle");



            var jqxhr = $.post(base_url + "/Productos/desactivar/" + id, function(data, status) {
                //bootbox.alert(data);
                var tabla = $('#listado').DataTable();
                tabla.ajax.reload();
            });
        });
    });

}

function activar() {
    var btnActivar = document.querySelectorAll(".btnActivar");

    btnActivar.forEach(function(btnActivar) {
        btnActivar.addEventListener('click', function() {
            var id = btnActivar.getAttribute("rla");
            var jqxhr = $.post(base_url + "/Productos/activar/" + id, function(e) {
                // bootbox.alert(data);
                var tabla = $('#listado').DataTable();
                tabla.ajax.reload();
            });
        });
    });


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