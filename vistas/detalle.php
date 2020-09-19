<?php
 require_once "../config/Conexion.php";
 $cod = $_REQUEST['cod'];
 $conexion = new Conexion();
 $sql = "SELECT * FROM producto WHERE idproducto = '$cod' ";
 setlocale(LC_MONETARY,"en_US");
 $lista = $conexion->listarMatriz2($sql);
 $nombre = $lista["nombre"];
 $descripcion = $lista["descripcion"]; 

 ?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
             
        <title>Detalle</title>
              
    </head>
    <body>
        
        <form>
            <table border="0">
                <tr>
                    <th rowspan="4"> <img src="../files/productos/<?php echo $lista["imagen"]; ?>" width = "200"  height ="170"> </th>
                    <th><?php echo $lista["nombre"];  ?></th>
                </tr>
                <tr>
                    <td align="justify" ><?php echo $lista["descripcion"];  ?></th>
                </tr> 
                <tr>
                    <th align="right" > $ <?php echo number_format( $lista["precio"],2);  ?></th>                  
                </tr>
                <tr>
                    <td align="right" > Ingrese cantidad: 
                        <input type="number" min ="1" max ="100" name ="cantidad"  value ="1">

                    </th>                  
                </tr>
                <tr>
                    <th align ="right" colspan ="2">
                    <button type="button" class="btn btn-secondary" >Cerrar</button>
                    <button type="button" class="btn btn-primary">Agregar a carrito </button>
                    </th>
                </tr>

            </table>
        </form> 
        
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
