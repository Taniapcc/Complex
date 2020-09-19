<?php
    session_start();
    $lista =$_SESSION['lista'];
   // https://www.youtube.com/watch?v=meI6qFdvivw&list=PLnWAzeXp9V4l4k4B5mpmAWG8-Gybzxdzl&index=16
     
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

     <title>Inicio</title>
                
      </head>
    <body >
<div class="container">
    <h2 align="center">Catalogo Productos</h2>
    <table border="0" width = "700" align="center" class="table">
        <tr align = "center">
        <?php
            $num=0;
            foreach ($lista as $reg){
                if($num==3){
                    echo "<tr align = 'center'>";
                    $num=1;
                } else{
                    $num++;
                } // fin if
         ?> 
            <th><img src="../files/productos/<?php echo $reg[9]; ?>" width = "120"  height ="120"> 
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" 
                onclick="enviar1(<?php echo $reg[0];?>)">Agregar</button> 
               
             </th> 
                
        <?php
        /*enviar(<?php echo $reg[0]; ?>)*/
            } //Fin foreach
        ?>

    </table>
 </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mostrar">
        ...
      </div>
      
    </div>
  </div>
</div>
<!-- Fin Modal -->


    <script>
        var resultado = document.getElementById("mostrar");
        function enviar(c){
            location.href =("detalle.php?cod="+c);              
        }
        function enviar1(c){
            var xmlhttp;
            if (window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            } else{
                xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
            } 
            
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    resultado.innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","detalle.php?cod="+c,true);
            xmlhttp.send();
        }
    </script>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 
    </body>
</html>