var listado;
//Función que se ejecuta al inicio
function init() {

    listar();

    //$("#ltablas").change(listar);

}


function listarParametro() {
    var ltablas = $("#ltablas").val();
    //alert(ltablas);

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
            { "data": "idauxiliares" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "condicion" },
            { "data": "options" }
        ]
    });
}
//Función para guardar o edi

function listar() {
    //alert(ltablas);

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
            "type": "get",
            "dataType": "json",
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




init();