$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
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