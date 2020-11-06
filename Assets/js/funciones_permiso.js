var tabla;
//Función que se ejecuta al inicio
function init() {
    listar();
    mostrarform(false);
    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })

    //Mostramos los permisos

    $.post(base_url + "/Permiso/permisos/" + id, function(r) {
        $("#permisos").html(r);
    });

}

function listar() {
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
            "url": base_url + "/Permiso/listar",
            "dataSrc": ""
        },
        "columns": [{
                "data": "options"
            },
            {
                "data": "idusuario"
            },
            {
                "data": "cedula"
            },
            {
                "data": "nombre"
            },
            {
                "data": "condicion"
            }

        ]
    });
}



//Función mostrar formulario
function mostrarform(flag) {

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


//Función cancelarform
function cancelarform() {
    limpiar();
    mostrarform(false);
}

function limpiar() {
    $("#nombre").val("");

}

/**
 * Mostrar información del registro
 */

function fnEditar() {
    var btnTablas = document.querySelectorAll(".btnTablas");

    btnTablas.forEach(function(btnTablas) {
        btnTablas.addEventListener('click', function() {
            var id = this.getAttribute("rl");
            var formData = new FormData($("#formulario")[0]);
            //alert($id);

            var jqxhr = $.post(base_url + "/Permiso/getTabla/" + id, function(data, status) {
                mostrarform(true);

                $("#idusuario").val(data.idusuario);
                $("#id").val(data.idusuario);
                $("#nombre").val(data.nombre);
                $("#permisos").val(data.valores);
            }, "json");

            $.post(base_url + "/Permiso/permisos/" + id, function(r) {
                $("#permisos").html(r);
            });


        });
    });
}


function guardaryeditar(e) {

    e.preventDefault(); //No se activará la acción predeterminada del evento

    var idusuario = document.querySelector('#idusuario').value;
    var nombre = document.querySelector('#nombre').value;
    var lpermiso = document.querySelectorAll('#permisos');

    //https: //w3api.com/wiki/DOM:Document.querySelectorAll()

    $("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        "url": base_url + "/Permiso/setPermiso",
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





init();