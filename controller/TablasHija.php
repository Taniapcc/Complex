<?php
# Controlador generico para 3 campos
class TablasHija extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    function tablasHija($id)
    {
        # 
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            # code...
            $data['tag_page'] = "TablasHija -  Tienda Virtual ";
            $data['page_title'] = "TablasHija - <small> Tienda Virtual </small>";            
            $data['page_name'] = "TablasHija";

            # parametrización
            $data['name_view'] = "tablasHija"; //vista principal CONTROLLER LISTAR
            $data['name_table'] = "Auxiliares";
            $data['id_table']   = $id;

            //llamado a la vista         
           $this->views->getViews($this, $data['name_view'], $data);
        } else {
            # code...
            header("location:" . base_url() . "/Admon");
        }
    }

    
   function desactivar($id){
        
        $data = $this->model->desactivar($id); 
        
        if ($data){
           header("location:" . base_url() . "/TablasHija");   
        }else
        {
            echo "NO se pudo desactivar";
        }
        return $data;
    }
    
    function activar($data){
        $data = $this->model->activar($data);
        if ($data){
           header("location:" . base_url() . "/TablasHija");          
        }else
        {
            echo "NO se pudo activar";
        }
        return $data;
    }
    

    function buscar($id){
        
        $data = $this->model->desactivar($id);
        
          # parametrización
          $data['name_vista'] = "tablasHija"; //vista principal Edicion
          $data['name_table'] = "Auxiliares";
          $data['id_table']   = $id;
          $data['card-title']  = "Listado Detalle";
          $this->views->getViews($this, $data['name_vista'] , $data);   
         //llamar a la vista que queremos ver
        
         return $data;
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

    function validaNombre ($nombre){
        $data = $this->model->validaNombre($nombre);             
        return $data;
    }
    
    /**
     * 
     *  VALIDACION PARA ALTA
     */
    function validaData($data)
    {
       
        $errores= array();
        
        if (trim($data['nombre']) == "") {
            array_push($errores, "Nombre es requerido");
        }

        $r = $this->validaNombre( $data['nombre']);
        if ($r > 0){
                array_push($errores, "TablasHija ya existe");
         }

        if (trim($data['descripcion']) == "") {
            array_push($errores, "Descripcion es requerido");
        }
             
        return $errores;
    }


    /**
     * 
     *  VALIDACION PARA BAJA
     */
    function validaDataBC($data)
    {
        
        $errores= array();
        
        if (trim($data['nombre']) == "") {
            array_push($errores, "Nombre es requerido");
        }

        if (trim($data['descripcion']) == "") {
            array_push($errores, "Descripcion es requerido");
        }
             
        return $errores;
    }


    function listar($id)
    {
        
        
        $data = $this->model->listar($id);

        dep($data);
        exit;
        
        for ($i = 0; $i < count($data); $i++) {

            // Identifico el estado de categorias
            $camino = base_url();

            if ($data[$i]['condicion'] == 1) {
                $data[$i]['condicion'] = '<span class="badge badge-success">Activo</span>';
                // Añadir Acciones al formulario
                $data[$i]['options'] = '<div class = "text-center">
                        <a href="' . base_url() . '/TablasHija/cambio/' . $data[$i]['idauxiliares'] . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnTablas"><i class = "fas fa-pencil-alt"></i></a> 
                        <a href="' . base_url() . '/TablasHija/desactivar/' . $data[$i]['idauxiliares'] . ' " title= "Eliminar"  " class="btn-outline-danger btn-sm btnTablas"><i class = " fas fa-trash-alt""></i></a> 
                        <a href="' . base_url() . '/TablasHija/buscar/' . $data[$i]['idauxiliares'] . ' " title= "Buscar"  " class="btn-outline-danger btn-sm btnTablas"><i class = " fas fa-trash-alt""></i></a> 
                </div>';
           
           
            } else {
                $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>'; 
                 // Añadir Acciones al formulario
                $data[$i]['options'] = '<div class = "text-center">
                <a href="' . base_url() . '/TablasHija/cambio/' . $data[$i]['idauxiliares'] . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnTablas"><i class = "fas fa-pencil-alt"></i></a> 
                <a href="' . base_url() . '/TablasHija/activar/' . $data[$i]['idauxiliares'] . ' " title= "Activar"  " class="btn-outline-success btn-sm btnTablas"><i class = "fas fa-undo"></i></a> 
                <a href="' . base_url() . '/TablasHija/buscar/' . $data[$i]['idauxiliares'] . ' " title= "Buscar"  " class="btn-outline-danger btn-sm btnTablas"><i class = " fas fa-trash-alt""></i></a> 
             </div>';
            }
           
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

     /**
     * 
     *  PROCESO PARA CAMBIAR FORMULARIO
     * 
     */

    function cambio($id)
    {
        $errores = array();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $idauxiliares = isset($_POST["idauxiliares"]) ? strClean($_POST["idauxiliares"]) : "";
            $nombre = isset($_POST["nombre"]) ? strClean($_POST["nombre"]) : "";
            $descripcion = isset($_POST["descripcion"]) ? strClean($_POST["descripcion"]) : "";

            //RESCATAR INFORMACION DEL FORMULARIO
            $data['idauxiliares'] = $idauxiliares;
            $data['nombre'] =       $nombre;
            $data['descripcion'] = $descripcion;
                        
            //FIN RESCATAR

            $errores = $this->validaDataBC($data);

            if (count($errores) == 0) {

                $r = $this->editar($data);                 
                
                if ($r){
                    header("location:" . base_url() . "/TablasHija");
                    //header("location:" . base_url() . "/".$data['name_vista']);
                }else
                {
                    echo "NO se actualizó";
                }

            }else {
                echo "tengo errores";              
                 
            }
        } else {

            // Editar  formulario

            $data = $this->mostrar($id);  //llamar al metodo de la clase View            
            $data['tag_page'] = " TablasHija";
            $data['page_title'] = "TablasHija";
            $data['page_name'] = "TablasHija";
            $data['card_title'] = "Edición TablasHija";
            
            # parametrización
            $data['name_vista'] = "tablasEditar"; //vista principal Edicion
            $data['name_table'] = "Auxiliares";
            $data['id_table']   = "idauxiliares";

            //llamar a la vista que queremos ver

            $this->views->getViews($this, $data['name_vista'] , $data);
        }
    }

     /**
     * 
     *  PROCESO PARA ALTA FORMULARIO
     * 
     */

     //Alta
    function alta()
    {
        $errores = array();
        
          if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $nombre = isset($_POST["nombre"]) ? strClean($_POST["nombre"]) : "";
            $descripcion = isset($_POST["descripcion"]) ? strClean($_POST["descripcion"]) : "";
           
            // rescatar información del formulaio
            $data['nombre'] = $nombre;
            $data['descripcion'] = $descripcion;
            
            $errores = $this->validaData($data);

             if (count($errores) == 0) {
               
                $r = $this->model->alta($data);


                if ($r) {
                    header("location:" . base_url() . "/TablasHija");
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

                    if (NO_DEPURADOR) {
                        //$this->views->getViews($this, "mensaje", $data);
                    }
                }
            } else {

                /**  Desplegar información de errores  */
                
                $data['tag_page'] =    "TablasHija Alta";
                $data['page_title'] = "TablasHija ";
                $data['page_name'] = "TablasHija Alta";
                $data['card_title'] = "TablasHija Alta" ;
                $data['errores'] = $errores;
                //llamado a la vista 

                # parametrización
                $data['name_vista'] = "tablasAlta"; //vista principal Alta
                $data['name_table'] = "Auxiliares";
                $data['id_table']   = "idauxiliares";

                $this->views->getViews($this,  $data['name_vista'], $data);
            }
        } else {

            $data['tag_page'] = "TablasHija Alta";
            $data['page_title'] = "TablasHija ";
            $data['page_name'] = "TablasHija Alta";
            $data['card_title'] = "TablasHija Alta" ;
            //llamado a la vista  

            # parametrización
            $data['name_vista'] = "tablasAlta"; //vista principal Alta
            $data['name_table'] = "Auxiliares";
            $data['id_table']   = "idauxiliares";

            $this->views->getViews($this, $data['name_vista'], $data);
        } // else SERVER
    }  // Fin alta






}

?>

