var tabla;

//Función que se ejecuta al inicio
function init() {
    listar();
}

//Función Listar
function listar() {

    $("#listadoCategoria").DataTable({
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
            "url": base_url + "/Categoria/listar",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idcategoria" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "condicion" },
            { "data": "options" }
        ]
    });
}
//Función para guardar o editar


init();