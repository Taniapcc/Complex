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

// Acceder a un campo del data generado

 dep($data[0]['idrol']); exit;


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

 
>>>>>>>>>>>>>>><<<Mensaje de Error >>>>>>>>>>>>>>>>>>>>>><

$data['tag_page'] = "Registrar Cuenta  ";
                 $data['page_title'] = "Registrar Cuenta- <small> Tienda Virtual </small>";
                 $data['page_name'] = "Registrar Cuenta";
                 $data['errores'] = $errores;
                 //llamado a la vista              
                 $this->views->getViews($this, "AdmonUsuario", $data);


>>>>>>>>>>>>><<Fin mensaje de error <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<





Prueba

            $camino = base_url()."\editar\metodo\".$data[$i]['idusuario'];


            $data[$i]['options'] = '<div class = "text-center"> 
                        <button  class="btn btn-outline-secondary btn-sm btnPermisoRol" rl="'.$data[$i]['idusuario'].'" title= "Permiso"><i class = "fas fa-key"></i> </button>
                        <button  class="btn btn-outline-primary btn-sm btnPermisoRol" rl="'.$data[$i]['idusuario'].'" title= "Editar"><i class = "fas fa-pencil-alt"></i> </button>
                        <button  class="btn btn-outline-danger btn-sm btnPermisoRol" rl="'.$data[$i]['idusuario'].'" title= "Eliminar"><i class = "fas fa-trash-alt"></i> </button>
                    
            </div>';        

            }


          //  <a href= base_url."\editar.php\". $data[$i]['idusuario']. class="btn btn-outline-secondary btn-sm btnPermisoRol" role="button" aria-disabled="true">Primary link</a>


 <<<<<<<<<<<<<Esqueleto FORMULARIOS <<<<<<<<<<<<<<<<<<<<<<<<

 <div class="content-wrapper">
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-user-tag"> </i><?php echo $data["page_title"]; ?>
              <button type="button" class="btn bg-gradient-primary" name="btnAgregar" id="btnAgregar" data-toggle="modal" data-target="#modalFormRol" onclick="openModal();">
                <i class="fa fa-plus-circle"></i>
                Agregar
              </button>
              <!-- #modal-lg -->
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Categoria"><i class="fa fa-home fa-lg"></i></a></li>
              <li class="breadcrumb-item active"><?php echo $data["page_title"]; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> <!-- content-header -->

     <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="card">
            
            <div class="card-body">
               <form action="<?php echo base_url(); ?>/Categoria/Cambio/" method="post">
                
               </form> <!-- /.Formulario -->
            
           </div>  <!-- /.card-body -->
            
          </div> <!-- /.card -->
          
        </div> <!-- /.class -->
      </div> <!-- /.row -->
    </div>  <!-- /.container-fluid -->

  </section>  <!-- /.content -->
  
 </div>  <!-- content-wrapper -->


>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<

    FORMULARIO RAPIDO

>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<

 <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Different Height</h3>
              </div>
              <div class="card-body">
                <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
                <br>
                <input class="form-control" type="text" placeholder="Default input">
                <br>
                <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Different Width</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    <input type="text" class="form-control" placeholder=".col-3">
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder=".col-4">
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" placeholder=".col-5">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Input Addon</h3>
              </div>
              <div class="card-body">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Username">
                </div>

                <div class="input-group mb-3">
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>

                <h4>With icons</h4>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email">
                </div>

                <div class="input-group mb-3">
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
                  </div>
                </div>

                <h5 class="mt-4 mb-2">With checkbox and radio inputs</h5>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox">
                        </span>
                      </div>
                      <input type="text" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio"></span>
                      </div>
                      <input type="text" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->

                <h5 class="mt-4 mb-2">With buttons</h5>

                <p>Large: <code>.input-group.input-group-lg</code></p>

                <div class="input-group input-group-lg mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="#">Action</a></li>
                      <li class="dropdown-item"><a href="#">Another action</a></li>
                      <li class="dropdown-item"><a href="#">Something else here</a></li>
                      <li class="dropdown-divider"></li>
                      <li class="dropdown-item"><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <input type="text" class="form-control">
                </div>
                <!-- /input-group -->

                <p>Normal</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-danger">Action</button>
                  </div>
                  <!-- /btn-group -->
                  <input type="text" class="form-control">
                </div>
                <!-- /input-group -->

                <p>Small <code>.input-group.input-group-sm</code></p>
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div>
                <!-- /input-group -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Horizontal Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>


          // HELPERS AJAX

          https://www.baulphp.com/usando-ajax-con-php-mysql-ejemplos/


          // cambiar texto
          http://mialtoweb.es/modificar-html-con-javascript/



          /// javascript

          BOTON PARA ACTIVAR

          function fnVer() {
    alert("Ver");
    var btnVer = document.querySelectorAll(".btnVer");

    btnVer.forEach(function(btnTablas) {
        btnTablas.addEventListener('click', function() {


        });

    });
}