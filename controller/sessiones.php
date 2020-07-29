<?php
function usuario_autentificado(){
    if(!reviar_usuario)(){
        header('location:login.php');
        exit();
    }

}

function revisar_usuario(){
    return isset($_SESSION['nombre'])
}

Session_start();
usuario_atentificado();

?>

