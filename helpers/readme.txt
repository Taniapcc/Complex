//Tienda Virtual en PHP, MySql, POO, PDO, MVC (Enviar datos al Controlador)
//Abel OS
//https://www.youtube.com/watch?v=O2By5jlvVVs

//Imagenes
http://lorempixel.com/


https://www.youtube.com/watch?v=x_7hm9OlVVA&list=PL3b9xmg86NTIy18iJLav8oGyA3c__lw0S&index=9


https://www.youtube.com/user/febel24/playlists

//editor de photos
https://www.fotor.com/


https://www.youtube.com/watch?v=vn4wHWvYEdg&list=PL3b9xmg86NTIy18iJLav8oGyA3c__lw0S&index=14


<<<< Estructura Tabla >>>>
<!-- Main content -->
    <section class="content">
        <div class="container-fluid"> 
          <div class="row">
          <div class="col-12">


          </div>
          </div>          
        </div>
    </section>

<!-- recorre Tabla -->

<!--
                  <?php

                    foreach($matrizPersona as $registro){?>
                          <tr>
                            <!-- <td>
                                <a href="editar-persona.php?id= <?php echo $registro["idusuario"]; ?>" class="btn bg-success btn-flat margin">
                                <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="#" data-id="<?php echo $registro["idusuario"]; ?>" data-tipo ="admin" class="btn bg-maroon  btn-flat margin borrar-registro" > 
                                <i <?Php echo $registro["condicion"] ? 'class= "far fa-check" ': '"fa fa-close"'; ?>>
                                </i>
                                </a>
                              </td>  -->

                              <td>
                                <?php 
                                  echo '<button class="btn btn-warning" onclick="mostrar('.$registro["idusuario"].')"><i class="fas fa-pen"></i></button>';
                                 if ($registro["condicion"]){
                                     echo '<button class="btn btn-danger" onclick="mostrar('.$registro["idusuario"].')"><i class="fa fa-times"></i></button>';
                                  }else {
                                     echo ' <button class="btn btn-primary" onclick="activar('.$registro["idusuario"].')"><i class="fa fa-check"></i></button>';
                                 }                                  
                                  
                                ?>
                              </td>
                             
                              <td><?php echo $registro["login"];  ?></td>
                              <td><?php echo $registro["nombre"];  ?>  </td> 
                              <td><?php echo $registro["condicion"] ?'<span class="label bg-green">Activado</span>':
                              '<span class="label bg-red">Desactivado</span>'
                              ; ?></td>
                             
                          </tr>                          
                        
                  <?php   }
                  ?>