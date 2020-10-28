<?php
# Controlador generico para 3 campos
class Tablas extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function tablas()
    {
        #
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            # code...
            $ltablas = $this->selectTabla();
            $data['tag_page'] = "Tablas -  Tienda Virtual ";
            $data['page_title'] = "Tablas - <small> Tienda Virtual </small>";
            $data['page_name'] = "Tablas";
            $data['card_title'] = "Listado de Tablas";

            # parametrización
            $data['name_view'] = "tablas"; //vista principal CONTROLLER LISTAR
            $data['name_table'] = "Auxiliares";
            $data['id_table']   = "idauxiliares";
            $data['ltablas']   = $ltablas;

            //llamado a la vista
            $this->views->getViews($this, $data['name_view'], $data);
        } else {
            # code...
            header("location:" . base_url() . "/Admon");
        }
    }// tablas


    function selectTabla()
    {
        $data = $this->model->selectTabla();
        return $data;
    } // select Tabla

    function guardaryeditar(){

        $tab_name = "Tablas";
        $errores = array();
        $datos = [];

        // Extraigo valors del formulario
        $idauxiliares = isset($_POST["idauxiliares"]) ? limpiarCadena($_POST["idauxiliares"]) : "";
        $idtabla = isset($_POST["idtabla"]) ? limpiarCadena($_POST["idtabla"]) : "";
        $idsubtabla = isset($_POST["idsubtabla"]) ? limpiarCadena($_POST["idsubtabla"]) : "";
        $nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
        $descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";

        // Rescato variables

        $datos['idauxiliares'] = $idauxiliares;
        $datos['idtabla'] =      $idtabla;
        $datos['idsubtabla'] =   $idsubtabla;
        $datos['nombre'] =       $nombre;
        $datos['descripcion'] =  $descripcion;
        // validar informacion
       

        $errores = $this->validaData($datos);

        if (count($errores)==0) {

            if (empty($idauxiliares)) {
                $rspta=$this->insertar($datos);
                //echo $rspta ? $tab_name. " registrada" : $tab_name." no se pudo registrar";

                if ($rspta>0) {
                    $arrRespuesta = array('status'=> true,'msg' => 'Datos guardados correctamente.' );
                } elseif ($rspta == 'Existe') {
                    $arrRespuesta = array('status'=> false,'msg' => 'Atención el dato ya Existe.' );
                } else {
                    $arrRespuesta = array('status'=> false,'msg' => 'No es posible almacenar la información.' );
                }
                   
               
			    echo $rspta ? $tab_name. " registrada" : $tab_name." no se pudo registrar";
                
                //echo json_encode($arrRespuesta, JSON_UNESCAPED_UNICODE);
                //die();


            } else {
                //$rspta=$this->editar($idauxiliares, $idtabla, $idsubtabla, $nombre, $descripcion);
                $rspta=$this->editar($idauxiliares, $idtabla, $idsubtabla, $nombre, $descripcion);
                echo $rspta ? $tab_name. " actualizada" : $tab_name. " no se pudo actualizar";
            }
        }


    }// fin guardaryeditar

    function indice() {
       $data = $this->model->indice();
       //dep($data['id']);
       return $data;
    }

    function setTablas(){
        
       // Extraigo valores del formulario
       $datos = [];
      
       $idauxiliares = strclean($_POST["idauxiliares"]) ;
       $idtabla = strclean($_POST["idtabla"]) ;
       $idsubtabla = strclean($_POST["idtabla"]) ;
       $nombre = strClean($_POST["nombre"]) ;
       $descripcion = strClean($_POST["descripcion"]);

       // Rescato variables
       $datos['idauxiliares'] =  $idauxiliares;
       $datos['idtabla'] =      $idtabla;
       $datos['idsubtabla'] =   $idsubtabla;
       $datos['nombre'] =       $nombre;
       $datos['descripcion'] =  $descripcion;

       $errores = $this->validaData($datos);
       //dep($errores);

       if(count($errores)== 0){

            if (empty($idauxiliares)) {
                // insertar
                //dep($datos);
                $rspta = $this->insertar($datos); 
    
            }else {
                
                // EDITAR   
            }
       }
    
    }
    
    function insertar($datos)
    {
        $rspta = $this->model->insertar($datos);
        return $rspta;              
    } //fin insertar
    
    function editar($datos)
    {
        $rspta = $this->model->insertar($datos);
        return $rspta;              
    } //fin insertar
    

    public function desactivar($idauxiliares)
    {
        $data = $this->model->desactivar($idauxiliares);

        if ($data) {
            header("location:" . base_url() . "/Tablas");
        } else {
            echo "NO se pudo desactivar";
        }
        return $data;
    }

    public function activar($idauxiliares)
    {
        $data = $this->model->activar($idauxiliares);
        if ($data) {
            header("location:" . base_url() . "/Tablas");
        } else {
            echo "NO se pudo activar";
        }
        return $data;
    }

    
   
    public function mostrar($id)
    {
        $data = $this->model->mostrar($id);
        return $data;
    }

    
    public function validaNombre($nombre)
    {
        $data = $this->model->validaNombre($nombre);
        return $data;
    }


    public function validaData($data)
    {
        $errores = array();

        if (trim($data['nombre']) == "") {
            array_push($errores, "Nombre es requerido");
        }

        $r = $this->validaNombre($data['nombre']);
        if ($r > 0) {
            array_push($errores, "Información ya existe en la base de datos");
        }

        if (trim($data['descripcion']) == "") {
            array_push($errores, "Descripción es requerido");
        }

        return $errores;
    }


     function listarOK()
    {
        $indice = array();
        $ltablas = isset($_REQUEST["ltablas"]) ? limpiarCadena($_REQUEST["ltablas"]) : "";

        if ( isset($_REQUEST["ltablas"]) ) {
            $data = $this->model->listar1($ltablas);

            for ($i = 0; $i < count($data); $i++) {

                if ($data[$i]['condicion'] == 1) {

                    if ($data[$i]['idsubtabla'] <> 0) {
                        $data[$i]['condicion'] = '<span class="badge badge-success">Activo</span>';
                        // Añadir Acciones al formulario
                        $data[$i]['options'] = '<div class = "text-center">
                            <a href="' . base_url() . '/Tablas/cambio/' . $data[$i]['idauxiliares'] . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnTablas"><i class = "fas fa-pencil-alt"></i></a> 
                            <a href="' . base_url() . '/Tablas/desactivar/' . $data[$i]['idauxiliares'] . ' " title= "Eliminar"  " class="btn-outline-danger btn-sm btnTablas"><i class = " fas fa-trash-alt""></i></a> 
                            <a href="' . base_url() . '/Tablas/buscar/' . $data[$i]['idauxiliares'] . ' " title= "Buscar"  " class="btn-outline-danger btn-sm btnTablas"><i class = " fas fa-trash-alt""></i></a> 
                    </div>';
                    }
                } else {

                    if ($data[$i]['idsubtabla'] <> 0) {
                        $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>';
                        // Añadir Acciones al formulario
                        $data[$i]['options'] = '<div class = "text-center">
                    <a href="' . base_url() . '/Tablas/cambio/' . $data[$i]['idauxiliares'] . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnTablas"><i class = "fas fa-pencil-alt"></i></a> 
                    <a href="' . base_url() . '/Tablas/activar/' . $data[$i]['idauxiliares'] . ' " title= "Activar"  " class="btn-outline-success btn-sm btnTablas"><i class = "fas fa-undo"></i></a> 
                    <a href="' . base_url() . '/Tablas/buscar/' . $data[$i]['idauxiliares'] . ' " title= "Buscar"  " class="btn-outline-danger btn-sm btnTablas"><i class = " fas fa-trash-alt""></i></a> 
                 </div>';
                    } //ifelse
                }
            } // for

           echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();            
        } // if listas    
    }// LISTAR

    function listar()
    {
        $indice = array();
        $ltablas = isset($_REQUEST["ltablas"]) ? limpiarCadena($_REQUEST["ltablas"]) : "";

        if ( isset($_REQUEST["ltablas"]) ) {
            $data = $this->model->listar1($ltablas);

            for ($i = 0; $i < count($data); $i++) {

                if ($data[$i]['condicion'] == 1) {

                        $data[$i]['condicion'] = '<span class="badge badge-success">Activo</span>';
                        // Añadir Acciones al formulario
                        $data[$i]['options'] = '<div class = "text-center"> 
                            <div class="btn-group">
                                <button type="button" class="btn-outline-primary btn-sm btnTablas" title = "Eliminar" onclick="desactivar('.$data[$i]["idauxiliares"].')"  ><i class = "fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn-outline-danger btn-sm btnTablas"><i class = " fas fa-trash-alt""></i></button>                        
                        </div>
                            
                        </div>';  
                } else {
                    
                       $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>';
                        // Añadir Acciones al formulario
                        $data[$i]['options'] = '<div class = "text-center"> 
                            <div class="btn-group">
                                <button type="button" class="btn-outline-primary btn-sm btnTablas"  onclick="desactivar('.$data[$i]["idauxiliares"].')"><i class = "fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn-outline-danger btn-sm btnTablas"><i class = "fas fa-undo"></i></button>                        
                        </div>
                            
                        </div>';  
                            
                            
                      


                               
                }       
                   
            } // for

           echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();            
        } // if listas    
    }// LISTAR





}   // fin clases    

                                

       