/*$("#frmAcceso").on('submit',
    function(e) {
        e.preventDefault();
        logina = $("#logina").val();
        clavea = $("#clavea").val();

        $.post("../controller/usuario.php?op=verificar", {
                login: logina,
                clave: clavea
            },

            function(data) {
                // JSON.parse(data);

                alert("Data Loaded: " + data);

                /*if (data.login != null) {

                    $(location).attr("href", "producto.php");
                } else {
                    bootbox.alert("Usuario y/o Password incorrectos");

                }*/

/*         });
 })*/

$("#frmAcceso").on('submit',

    function(e) {
        e.preventDefault(); //No se activará la acción predeterminada del evento
        //$("#btnGuardar").prop("disabled", true);

        logina = $("#logina").val();
        clavea = $("#clavea").val();
        $.post("../controller/usuario.php?op=verificar", {
                    login: logina,
                    clave: clavea
                },

                function(data) {
                    // JSON.parse(data);

                    alert("Data Loaded: " + data.idusuario);

                    /*if (data.login != null) {

                        $(location).attr("href", "producto.php");
                    } else {
                        bootbox.alert("Usuario y/o Password incorrectos");

                    }  */
                    //console.log(data.login);

                }

            ) // post

    } //e

)