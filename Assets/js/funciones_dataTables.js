//alert(base_url);
$(function() {

    $("#tablaRoles").DataTable({
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
            "url": base_url + "/Roles/listar",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idrol" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "condicion" },
            { "data": "options" }
        ]
    });

    $("#listadoAdmin").DataTable({
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
            "url": base_url + "/UserSistema/listar",
            "dataSrc": ""
        },
        "columns": [
            { "data": "cedula" },
            { "data": "nombre" },
            { "data": "telefono" },
            { "data": "condicion" },
            { "data": "options" }
        ]
    });

    $("#example3").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 75, 100],
        buttons: ['excel', 'pdf', 'copy']


    });




    $('#example2').DataTable({

        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    $(document).ready(function() {
        $('#registros').DataTable({

            "paging": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 75, 100],
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            "language": {
                paginate: {
                    next: 'Siguiente',
                    previous: 'Anterior',
                    last: "Ultimo",
                    first: "Primero",
                },
                info: 'Mostrando _START_ a _END_ de _TOTAL_ registros ',
                emptyTable: "No hay registros",
                infoEmpty: "0 registros",
                search: "Buscar"
            },

        });
    });
});