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


 >>>>> Estructura de tarjetas <<<<<<<<<<<<<

 <!-- Main content -->
<div class="content">
      <div class="container">
        <div class="row">         
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
                <div class="card">
                
                    <div class="card-header card bg-primary text-white">
                          <h5 class="card-title m-0"><?php echo $data["page_title"] ; ?> </h5>
                    </div>  <!-- card header -->
                    <div class="card-body">
                          print "<h2 class='text-center'>".$data["subtitulo"]."</h2>";
                          print "<div class='alert ".$data["color"]." mt-3'>";
                          print $data["texto"];
                          print "</div>";
                          print "<a href='".BASE_URL.$data["url"]."' class='btn ".$data["colorBoton"]."'/>";
                          print $datos["textoBoton"]."</a>";

                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div> <!-- card body -->
                </div>  <!--card -->
          </div>  <!-- /.col-md-6 -->
        </div>  <!-- /.row -->
        
      </div><!-- /.container-fluid -->
</div>   <!--content-->

<!-- fin MAIN CONTENT -->   


<<<<<<<< HTML5  <<<<<<<<<<<<<<<<<<<<

 <a href="https://www.w3schools.com">Visit W3Schools</a> 


 >>>>>> MySql<<<<<<<<<<<<<<<<<<<
 <<<<MODELOS<<<<<<<<


 function insertar($data){
          
          $r = false;
          if ($this->validaCorreo($data["email"])) {
                $clave = hash_hmac("sha512", $data["clave1"], "clavesecreta");      
                $tienda =TIENDA;
                $cargo = 'Cliente';
                $tipoUsuario = 'Anonimo';

                $sql= "INSERT INTO usuario (nombre,  idtienda , cedula , direccion , telefono,  email,  cargo,  login,  clave,  codPostal,  tipoUsuario , ciudad  ) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

                $arrData = array($data["nombre"],
                            $tienda,
                            $data["cedula"],
  
                            $data["direccion"],
                            $data["telefono"],
                            $data["email"],
                            $cargo,
                            $data["login"],
                            $clave,
                            $data["codPostal"],                            
                            $tipoUsuario,
                            $data["ciudad"]);
                $r = $this->insert($sql, $arrData);     
                        
          } 
          return $r;
        }
      


      function validaCorreo($email){
          $sql = "SELECT * FROM usuario WHERE email='".$email."'";
          $rows = $this->queryRows($sql);          
          return ($rows==0)?true:false;
        }

 





 