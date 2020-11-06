function listarSinParametros() {

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
        "columns": [
            { "data": "options" },
            { "data": "idusuario" },
            { "data": "cedula" },
            { "data": "nombre" },
            { "data": "condicion" }

        ]
    });
}