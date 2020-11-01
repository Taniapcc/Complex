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

  
    function indice() {
       $data = $this->model->indice();
       return $data;
    }

    //obtener los datos de la base de datos
    function getTabla(int $id){
        $intId = intval(strClean($id));
        if ($intId > 0){
           $arrData = $this->model->mostrar($intId);
           if (empty($arrData)) {
               $arrRspta = "No Existe el datos Get Tabla";
           }else{
                $data = $arrData;
                $arrRspta  = $data;
           }

           echo json_encode($arrRspta,JSON_UNESCAPED_UNICODE);
        }

        die();

    }
 
    function setTablas(){
        
       // Extraigo valores del formulario
       $idauxiliares = intval(strclean($_POST["idauxiliares"])) ;
       $idtabla = strclean($_POST["idtabla"]) ;
       $idsubtabla = strclean($_POST["idsubtabla"]) ;
       $nombre = strClean($_POST["nombre"]) ;
       $descripcion = strClean($_POST["descripcion"]);

       // Rescato variables
       $datos['idauxiliares'] =  $idauxiliares;
       $datos['idtabla'] =      $idtabla;
       $datos['idsubtabla'] =   $idsubtabla;
       $datos['nombre'] =       $nombre;
       $datos['descripcion'] =  $descripcion;

              
        if ($datos['idauxiliares'] == 0){
            $datos['ABC'] = 'A'; //alta
        }else{
            $datos['ABC'] = 'C'; //cambio
        }
                      
       $errores = $this->validaData($datos);
  
       if(count($errores)== 0){

            switch ( $datos['ABC']) {
                case 'A': // 
                    $rspta = $this->insertar($datos); 

                    if ($rspta>0) {
                        //  $arrRespuesta = array('status'=> true,'msg' => 'Datos guardados correctamente.' );
                        $arrRespuesta =  'Datos guardados correctamente PHP.';
                      } elseif ($rspta == 'Existe') {
                          $arrRespuesta =  'Atención el dato ya Existe.';
                      } else {
                          $arrRespuesta = 'No es posible almacenar la información.';
                      }
      
                      echo $arrRespuesta;
                    break;
                case 'C':
                    // modidifcar                    
                    $rspta = $this->editar($datos); 

                   if ($rspta>0) {
                      $arrRespuesta =  'Datos guardados correctamente PHP edit.';
                  } elseif ($rspta == 'No Existe') {
                      $arrRespuesta =  'Atención el dato No Existe.';
                  } else {
                      $arrRespuesta = 'No es posible almacenar la información.';
                  }

                  echo $arrRespuesta;    
                 break;
            }         
       }else{

         $arrRespuesta = 'Existe error en el ingreso de información, Algún dato no ingreso';
       }
    
    }
    
    function insertar($datos)
    {
        $rspta = $this->model->insertar($datos);
        return $rspta;              
    } //fin insertar
    
    function editar($datos)
    {              
        $rspta = $this->model->editar($datos);        
        return $rspta;              
    } //fin insertar
    

    function desactivar($id)
    {
        $id = Strclean($id);
        $r = $this->model->desactivar($id);
        if($r )
        {
             $resul = "Registro Eliminado";
        }else
        {
            $resul = "No se puedo eliminar el registro";
        }
        return $resul;
    }

    function activar($id)
    {
        $id = Strclean($id);
        $r = $this->model->activar($id);
        if($r )
        {
             $resul = "Registro Activo";
        }else
        {
            $resul = "No se puede activar el registro";
        }
        return $resul;
    }

    
   
    public function mostrar($id)

   {
        $idn = strClean($id);           
        $data = $this->model->mostrar('$idn');
       // echo json_encode($data, JSON_UNESCAPED_UNICODE);
        //die();
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

        if ($data['ABC']=="A") {
            $r = $this->validaNombre($data['nombre']);
            if ($r > 0) {
                array_push($errores, "Información ya existe en la base de datos");
            }
        }

        if (trim($data['descripcion']) == "") {
            array_push($errores, "Descripción es requerido");
        }

        return $errores;
    }

    
    function listar()
    {
        //$indice = array();
       
        $ltablas = $_REQUEST["ltablas"];

        //if ( isset($_REQUEST["ltablas"]) ) 
        if ( strClean($ltablas) ) 
        {
            $data = $this->model->listar1($ltablas);

            for ($i = 0; $i < count($data); $i++) {

                if ($data[$i]['condicion'] == 1) {

                    //onclick="fnEditar()" 

                        $data[$i]['condicion'] = '<span class="badge badge-success">Activo</span>';
                        // Añadir Acciones al formulario
                        $data[$i]['options'] = '<div class = "text-center"> 
                            <div class="btn-group">
                                <button type="button" class="btn-outline-primary btn-sm btnTablas" tabindex ="0"  rl="'.$data[$i]["idauxiliares"].'" title = "Editar" onclick="fnEditar()"   ><i class = "fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn-outline-danger btn-sm btnEliminar" tabindex ="0" rle = "'.$data[$i]["idauxiliares"].'" title = "Eliminar" onclick="desactivar()" ><i class = " fas fa-trash-alt""></i></button>                        
                        </div>
                            
                        </div>';  
                } else {
                    
                       $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>';
                        // Añadir Acciones al formulario
                        $data[$i]['options'] = '<div class = "text-center"> 
                            <div class="btn-group">
                            <button type="button" class="btn-outline-primary btn-sm btnTablas" tabindex ="0"  rl="'.$data[$i]["idauxiliares"].'" title = "Editar" onclick="fnEditar()"  ><i class = "fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn-outline-warning btn-sm btnActivar" tabindex ="0" rla="'.$data[$i]["idauxiliares"].'" title = "Recuperar" onclick="activar()"><i class = "fas fa-undo"></i></button>                        
                        </div>                            
                        </div>';                                
                }       
                   
            } // for

           echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();            
        } // if listas    
    }// LISTAR



}   // fin clases    

                                

       