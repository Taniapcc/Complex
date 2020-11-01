<?php

class Categoria extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    
    function categoria()
    {
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            # code...
            $data['tag_page'] = "Categoria -  Tienda Virtual ";
            $data['page_title'] = "Categoria - <small> Tienda Virtual </small>";
            $data['page_name'] = "categoria";
            //llamado a la vista
            $this->views->getViews($this, "Categoria", $data);
        } else {
            # code...
            header("location:" . base_url() . "/Admon");
        }
    }

   function desactivar($id){
        
        $data = $this->model->desactivar($id); 
        
        if ($data){
            header("location:" . base_url() . "/Categoria");

        }else
        {
            echo "NO se pudo desactivar";
        }


        return $data;
    }
    
    function activar($data){
        $data = $this->model->activar($data);
        if ($data){
            header("location:" . base_url() . "/Categoria");

        }else
        {
            echo "NO se pudo activar";
        }



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
                array_push($errores, "Categoria ya existe");
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
                        <a href="' . base_url() . '/Categoria/cambio/' . $data[$i]['idcategoria'] . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnCategoria"><i class = "fas fa-pencil-alt"></i></a> 
                        <a href="' . base_url() . '/Categoria/desactivar/' . $data[$i]['idcategoria'] . ' " title= "Eliminar"  " class="btn-outline-danger btn-sm btnCategoria"><i class = " fas fa-trash-alt""></i></a> 
                       
            </div>';
           
           
            } else {
                $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>'; 
                 // Añadir Acciones al formulario
                $data[$i]['options'] = '<div class = "text-center">
                <a href="' . base_url() . '/categoria/cambio/' . $data[$i]['idcategoria'] . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnCategoria"><i class = "fas fa-pencil-alt"></i></a> 
                <a href="' . base_url() . '/categoria/activar/' . $data[$i]['idcategoria'] . ' " title= "Activar"  " class="btn-outline-success btn-sm btnCategoria"><i class = "fas fa-undo"></i></a> 
                
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

            $idcategoria = isset($_POST["idcategoria"]) ? strClean($_POST["idcategoria"]) : "";
            $nombre = isset($_POST["nombre"]) ? strClean($_POST["nombre"]) : "";
            $descripcion = isset($_POST["descripcion"]) ? strClean($_POST["descripcion"]) : "";

            //RESCATAR INFORMACION DEL FORMULARIO
            $data['idcategoria'] = $idcategoria;
            $data['nombre'] =       $nombre;
            $data['descripcion'] = $descripcion;
                        
            //FIN RESCATAR

            $errores = $this->validaDataBC($data);

            if (count($errores) == 0) {

                $r = $this->editar($data); 
                
                
                if ($r){
                    header("location:" . base_url() . "/Categoria");

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
            //$data['data'] = $data;
            $data['tag_page'] = " Categoria";
            $data['page_title'] = "Categoria";
            $data['page_name'] = "Categoria";
            $data['page_name'] = "Categoria";
            $data['card_title'] = "Edición Categoria";

            //llamar a la vista que queremos ver

            $this->views->getViews($this, "categoriaEditar", $data);
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
                    header("location:" . base_url() . "/Categoria");
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
                // dep($errores);

                $data['tag_page'] = "Categoria Alta";
                $data['page_title'] = "Categoria ";
                $data['page_name'] = "Categoria Alta";
                $data['card_title'] = "Categoría Alta4" ;
                $data['errores'] = $errores;
                //llamado a la vista 

                $this->views->getViews($this, "categoriaAlta", $data);
            }
        } else {

            $data['tag_page'] = "Categoria Alta";
            $data['page_title'] = "Categoria ";
            $data['page_name'] = "Categoria Alta";
            $data['card_title'] = "Categoría Alta" ;
            //llamado a la vista  

            $this->views->getViews($this, "CategoriaAlta", $data);
        } // else SERVER
    }  // Fin alta


}

?>

