<li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--<img src="../public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen'];   ?>" class="user-image" alt="User Image"> 
                  <span class="hidden-xs"> <?php echo $_SESSION['nombre'];   ?> </span>
                </a>

                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen'];   ?>" class="img-circle" alt="User Image">
                    <p> www.ecolac.com - Empresa Lechera 
                      <small><?php echo $_SESSION['tienda'];   ?></small>
                    </p>
                  </li>
                                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../controller/usuario.php?op=salir" class="btn btn-success btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>