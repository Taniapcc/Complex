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
        "columns": [{
                "data": "options"
            },
            {
                "data": "idtabla"
            },
            {
                "data": "idauxiliares"
            },
            {
                "data": "nombre"
            },
            {
                "data": "descripcion"
            },
            {
                "data": "condicion"
            }

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
    var idauxiliares = document.querySelector('#idauxiliares').value;
    var idtabla = document.querySelector('#idtabla').value;
    var idsubtabla = document.querySelector('#idsubtabla').value;

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

            var jqxhr = $.post(base_url + "/Tablas/getTabla/" + id, function(data, status) {
                mostrarform(true);
                // alert("success");
                $("#nombre").val(data.nombre);
                $("#descripcion").val(data.descripcion);
                $("#idauxiliares").val(data.idauxiliares);
                $("#idtabla").val(data.idtabla);
                $("#idsubtabla").val(data.idsubtabla);

            }, "json")
        });
    });
}



function desactivar() {
    var btnEliminar = document.querySelectorAll(".btnEliminar");
    btnEliminar.forEach(function(btnEliminar) {
        btnEliminar.addEventListener('click', function() {
            var id = btnEliminar.getAttribute("rle");
            var jqxhr = $.post(base_url + "/Tablas/desactivar/" + id, function(data, status) {
                //bootbox.alert(data);
                alert(data);
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
            var jqxhr = $.post(base_url + "/Tablas/activar/" + id, function(e) {
                // bootbox.alert(data);
                var tabla = $('#listado').DataTable();
                tabla.ajax.reload();
            });
        });
    });









}






init();