var tabla;

function init() {

    listar();
    $("#idTable").change(listar);

}


function listar() {
    var idTable = $("#idTable").val();

    $tabla = $("#listado").DataTable({
        "destroy": true,
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
            "url": base_url + "/TablasHija/listar",
            "data": { "idTable": idTable },
            "dataSrc": ""
        },
        "columns": [
            { "data": "idauxiliares" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "condicion" },
            { "data": "options" }
        ],
        "bDestroy": true,
    });


}
//Función para guardar o editar

function openModal() {
    $('modalFormRol').modal('show');
}

init();