<?php
/**
 * Controlodar que maneja la plantilla de administradores
 */
class UserSistema extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function userSistema()
    {
        // Iniciar sesion
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            # code...

            //llamar al metodo de la clase View
            $data['tag_page'] = "Usuarios Sistema";
            $data['page_title'] = "Usuarios Sistema";
            $data['page_name'] = "Usuarios Sistema";

            //llamar a la vista que queremos ver

            $this->views->getViews($this, "userSistema", $data);

            // destruyo session
            // session_destroy();
        } else {
            # code...

            header("location:" . base_url() . "/Admon");
        }
    }

    function mostrar($id)
    {
        $data = $this->model->mostrar($id);
        return $data;
    }

    function editar ($data)
    {
        $data = $this->model->editar($data);
        return $data;
    }

    function validaLogin($login)
    {
        $data = $this->model->validaLogin($login);
        return $data;
    }

    function validaCorreo($email)
    {
        $data = $this->model->validaCorreo($email);
        return $data;
    }


    function desactivar($id){
        
        $data = $this->model->desactivar($id); 
        
        if ($data){
            header("location:" . base_url() . "/UserSistema");

        }else
        {
            echo "NO se pudo desactivar";
        }


        return $data;
    }
    
    function activar($data){
        $data = $this->model->activar($data);
        if ($data){
            header("location:" . base_url() . "/UserSistema");

        }else
        {
            echo "NO se pudo activar";
        }



        return $data;
	}




    function listar()
    {

        $data = $this->model->listar();
        for ($i = 0; $i < count($data); $i++) {

            // Identifico el estado de categorias
            $camino = base_url();

            if ($data[$i]['condicion'] == 1) {
                $data[$i]['condicion'] = '<span class="badge badge-success">Activo</span>';
                // Añadir Acciones al formulario
                $data[$i]['options'] = '<div class = "text-center">
                        <a href="' . base_url() . '/UserSistema/cambio/' . $data[$i]['idusuario'] . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnCategoria"><i class = "fas fa-pencil-alt"></i></a> 
                        <a href="' . base_url() . '/UserSistema/desactivar/' . $data[$i]['idusuario'] . ' " title= "Eliminar"  " class="btn-outline-danger btn-sm btnCategoria"><i class = " fas fa-trash-alt""></i></a> 
                       
            </div>';
           
            } else {
                $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>'; 
                 // Añadir Acciones al formulario
                $data[$i]['options'] = '<div class = "text-center">
                <a href="' . base_url() . '/UserSistema/cambio/' . $data[$i]['idusuario'] . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnCategoria"><i class = "fas fa-pencil-alt"></i></a> 
                <a href="' . base_url() . '/UserSistema/activar/' . $data[$i]['idusuario'] . ' " title= "Activar"  " class="btn-outline-success btn-sm btnCategoria"><i class = "fas fa-undo"></i></a> 
                
             </div>';
            }
           
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


  
    function validaData($data, $errores, $abc)
    {
        if (trim($data['cedula'] == "")) {
            array_push($errores, "Cédula  es requerido");
        }

        if (trim($data['nombre']) == "") {
            array_push($errores, "Nombre es requerido");
        }

        if (trim($data['ciudad']) == "") {
            array_push($errores, "Ciudad es requerido");
        }

        if (trim($data['direccion'] == "")) {
            array_push($errores, "Dirección  es requerido");
        }

        if (trim($data['telefono'] == "")) {
            array_push($errores, "Teléfono  es requerido");
        }


        if (trim($data['email'] == "")) {
            array_push($errores, "Email  es requerido");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            array_push($errores, "El correo electrónico no es válido");
        }

        if (!($this->validaCorreo($data['email']))) {
            array_push($errores, "Correo ya existe");
        }

        if (trim($data['codPostal'] =="")) {
            array_push($errores, "Código Postal  es requerido");
        }

        if (!filter_var($data['codPostal'], FILTER_VALIDATE_INT)) {
            array_push($errores," Codigo Postal solo puede ir números");                         
        }

        if (trim($data['login']=="")) {
            array_push($errores, "Nombre Usuario es requerido");
        }

        if ($abc == 'A') {
            if (trim($data['clave1']=="")) {
                array_push($errores, "Password  es requerido");
            }

            if (trim($data['clave2']=="")) {
                array_push($errores, "Retype password  es requerido");
            }

            if ($data['clave1']!= $data['clave2']) {
                array_push($errores, "Las claves de acceso no coinciden");
            }
        

         }

         
         if($abc == 'C'){

            if ($data['clave1']!= "" or $data['clave2']!= "") {
                if ($data['clave1']!= $data['clave2']) {
                    array_push($errores, "Las claves de acceso no coinciden");
                }
            }

         }

       

        return $errores;
    }

    //Alta
    function alta()
    {
        $errores = array();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            $cedula = isset($_POST["cedula"]) ? strClean($_POST["cedula"]) : "";
            $nombre = isset($_POST["nombre"]) ? strClean($_POST["nombre"]) : "";
            $ciudad = isset($_POST["ciudad"]) ? strClean($_POST["ciudad"]) : "";
            $direccion = isset($_POST["direccion"]) ? strClean($_POST["direccion"]) : "";
            $telefono = isset($_POST["telefono"]) ? strClean($_POST["telefono"]) : "";

            $email = isset($_POST["email"]) ? strClean($_POST["email"]) : "";
            $clave1 = isset($_POST["clave1"]) ? strClean($_POST["clave1"]) : "";
            $clave2 = isset($_POST["clave2"]) ? strClean($_POST["clave2"]) : "";
            $ciudad = isset($_POST["ciudad"]) ? strClean($_POST["ciudad"]) : "";
            $login = isset($_POST["login"]) ? strClean($_POST["login"]) : "";
            $codPostal = isset($_POST["codPostal"]) ? strClean($_POST["codPostal"]) : "";

            // rescatar información del formulaio
            $data['cedula'] = $cedula;
            $data['nombre'] = $nombre;
            $data['ciudad'] = $ciudad;
            $data['direccion'] = $direccion;
            $data['telefono'] = $telefono;
            $data['email'] = $email;
            $data['clave1'] = $clave1;
            $data['clave2'] = $clave2;
            $data['login'] = $login;
            $data['codPostal'] = $codPostal;


            $errores = $this->validaData($data, $errores, 'A');


            if (count($errores) == 0) {

                $r = $this->model->alta($data);

                if ($r) {

                    header("location:" . base_url() . "/userSistemaAlta");
                } else {
                    //actualizar

                    // Hubo algún error
                    $data['tag_page'] = "Error  ";
                    $data['page_title'] = "Error Registro <small> Tienda Virtual </small>";
                    $data['page_name'] = "Error";
                    $data['color'] = "bg-danger";
                    $data['classbtn'] = "btn btn-danger";
                    $data['name_boton'] = "regresar";
                    $data['url'] = base_url();
                    $data['texto'] = "Existió un error en el registro, posiblemente el correo ya existe.";

                    
                    //$this->views->getViews($this, "mensaje", $data);
                
                }
            } else {

                /**  Desplegar información de errores  */
                // dep($errores);

                $data['tag_page'] = "Empleado Alta";
                $data['page_title'] = "Alta Empleado";
                $data['page_name'] = "Alta Empleado";
                $data['errores'] = $errores;
                //llamado a la vista 

                $this->views->getViews($this, "userSistemaAlta", $data);
            }
        } else {

            $data['tag_page'] = "Empleado Alta";
            $data['page_title'] = "Alta Empleado";
            $data['page_name'] = "Alta Empleado";
            //llamado a la vista  

            $this->views->getViews($this, "", $data);
        } // else SERVER
    }  // Fin alta

    /**
     * 
     *  PROCESO PARA CAMBIAR FORMULARIO
     * 
     */

    function cambio($id)
    {
        $errores = array();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $idusuario = isset($_POST["idusuario"]) ? strClean($_POST["idusuario"]) : "";
            $cedula = isset($_POST["cedula"]) ? strClean($_POST["cedula"]) : "";
            $nombre = isset($_POST["nombre"]) ? strClean($_POST["nombre"]) : "";
            $ciudad = isset($_POST["ciudad"]) ? strClean($_POST["ciudad"]) : "";
            $direccion = isset($_POST["direccion"]) ? strClean($_POST["direccion"]) : "";
            $telefono = isset($_POST["telefono"]) ? strClean($_POST["telefono"]) : "";

            $email = isset($_POST["email"]) ? strClean($_POST["email"]) : "";
            $clave1 = isset($_POST["clave1"]) ? strClean($_POST["clave1"]) : "";
            $clave2 = isset($_POST["clave2"]) ? strClean($_POST["clave2"]) : "";
            $ciudad = isset($_POST["ciudad"]) ? strClean($_POST["ciudad"]) : "";
            $login = isset($_POST["login"]) ? strClean($_POST["login"]) : "";
            $codPostal = isset($_POST["codPostal"]) ? strClean($_POST["codPostal"]) : "";

            // rescatar información del formulaio
            $data['cedula'] = $cedula;
            $data['nombre'] = $nombre;
            $data['ciudad'] = $ciudad;
            $data['direccion'] = $direccion;
            $data['telefono'] = $telefono;
            $data['email'] = $email;
            $data['clave1'] = $clave1;
            $data['clave2'] = $clave2;
            $data['login'] = $login;
            $data['codPostal'] = $codPostal;
            $data['idusuario'] = $idusuario;

            $errores = $this->validaData($data, $errores, 'C');

            
            if (count($errores) == 0) {

                $r = $this->editar($data);

                if ($r) {
                    header("location:" . base_url() . "/userSistema");
                } else{

                    $data['tag_page'] = "Error  ";
                    $data['page_title'] = "Error Registro <small> Tienda Virtual </small>";
                    $data['page_name'] = "Error";
                    $data['color'] = "bg-danger";
                    $data['classbtn'] = "btn btn-danger";
                    $data['name_boton'] = "regresar";
                    $data['url'] = base_url();
                    $data['texto'] = "Existió un error en el registro, posiblemente el correo ya existe.";
                }          
                
            }else {
                echo "Existe  Errores";
                                
            }
        } else {

            $data = $this->mostrar($id);  //llamar al metodo de la clase View
            $data['data'] = $data;
            $data['tag_page'] = "Modificación Usuarios  Sistema";
            $data['page_title'] = "Modificación Usuarios Sistema";
            $data['page_name'] = "Modificación Usuarios Sistema";

            //llamar a la vista que queremos ver

            $this->views->getViews($this, "userSistemaModifica", $data);
        }
    }
}
