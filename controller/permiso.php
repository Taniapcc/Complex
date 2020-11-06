<?php
# Controlador generico para 3 campos
class Permiso extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function permiso()
    {
        #
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            # code...

            $lpermisos = $this->listarPermisos();
            $data['tag_page'] = "Permiso -  Tienda Virtual ";
            $data['page_title'] = "Permiso - <small> Tienda Virtual </small>";
            $data['page_name'] = "Permiso";
            $data['card_title'] = "Listado de Permiso";
            $data['lpermiso'] = $lpermisos;

            # parametrización
            $data['name_view'] = "permiso"; //vista principal CONTROLLER LISTAR
            //llamado a la vista
            $this->views->getViews($this, $data['name_view'], $data);
        } else {
            # code...
            header("location:" . base_url() . "/Admon");
        }
    } // permiso

    //Listar

    function listar()
    {
        // CAMBIAR AQUI
        $controlador = '/Permiso/';

        $data = $this->model->listar();

        for ($i = 0; $i < count($data); $i++) {

            //  CAMBIAR AQUI

            $id = $data[$i]['idusuario'];

            // Identifico el estado de categorias
            $camino = base_url();

            if ($data[$i]['condicion'] == 1) {
                $data[$i]['condicion'] = '<span class="badge badge-success">Activo</span>';
                // Añadir Acciones al formulario
                $data[$i]['options'] = '<div class = "text-center">
               
                <button type="button" class="btn-outline-primary btn-sm btnTablas" tabindex ="0"  rl="' . $id . '" title = "Editar" onclick="fnEditar()"   ><i class = "fas fa-pencil-alt"></i></button>        
                       
            </div>';
            } else {
                $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>';
                // Añadir Acciones al formulario
                $data[$i]['options'] = '<div class = "text-center">
               
                <button type="button" class="btn-outline-primary btn-sm btnTablas" tabindex ="0"  rl="' . $id . '" title = "Editar" onclick="fnEditar()"   ><i class = "fas fa-pencil-alt"></i></button>
                
             </div>';
            }
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    function listarPermisos()
    {
        $data = $this->model->listarPermisos();

        return $data;
    }

    function listarMarcados($id)
    {
        $data = $this->model->listarMarcados($id);
        return $data;
    }

     function permisos($id)
    {

        //Obtener los permisos asignados al usuario

        $marcados = $this->listarMarcados($id);

        //Declaramos el array para almacenar todos los permisos marcados
        $valores = array();

        //Almacenar los permisos asignados al usuario en el array

        for ($i = 0; $i < count($marcados); $i++) {
            # code...
            $elem = $marcados[$i]['idpermiso'];
            array_push($valores, $elem);
        }

        $lpermisos = $this->listarPermisos();

        //Mostramos la lista de permisos en la vista y si están o no marcados
        for ($i = 0; $i < count($lpermisos); $i++) {
            $elem = $lpermisos[$i]['idpermiso'];
            $nomelem = $lpermisos[$i]['nombre'];
            $sw = in_array($elem, $valores) ? 'checked' : '';
            echo '<li><input type="checkbox"  name="permiso[]" value="' . $elem . '"  ' . $sw . '>' . $nomelem . '</li>';
        }
    }
    /***
     *
     *  Obtiene los datos  de la base de datos
     * ESte proceso se dispara en la FUNCION getTablas.
     */

    public function mostrar(int $id)
    {
        $data = $this->model->mostrar($id);
        return $data;
    }

    /**
     *
     *  Mostrar la información del registro
     */

    public function getTabla(int $id)
    {
        $intId = intval(strClean($id));
        if ($intId > 0) {
            $arrData = $this->mostrar($intId);
            if (empty($arrData)) {
                $arrRspta = "No Existe el datos Get Tabla";
            } else {
                //datos del usuario
                $data = $arrData;
                $arrRspta  = $data;
                //permisos que tiene el usuario
                $lmarcados = $this->listarMarcados($intId);
                $valores  = array();

                for ($i = 0; $i < count($lmarcados); $i++) {
                    # code...
                    $elem = $lmarcados[$i]['idpermiso'];
                    array_push($valores, $elem);
                }

                $arrRspta['valores']  = $valores;
                $arrRspta['lmarcados']  = $lmarcados;
            }

            echo json_encode($arrRspta, JSON_UNESCAPED_UNICODE);
        }

        die();
    }


    /*
     *
     *  Guardar y editar GuardaryEditar()
     *
     */

     function eliminar ($id){
        $data = $this->model->eliminar($id);
        return $data;
     }  

    /***
     * 
     *  Guardar y Editar
     */

     function eliminar2($id){
        $data = $this->model->eliminar($id);
        dep($data);

        return $data;

     }

     function setPermiso()
    {
        $idusuario = intval(strclean($_POST["idusuario"]));
        $nombre = strClean($_POST["nombre"]);
        $lpermisos = $_POST["permiso"];

         // Rescato variables
        $datos['idusuario'] =  $idusuario;
        $datos['nombre'] =     $nombre;
        $datos['lpermisos'] = $lpermisos;

        // Actualizo la informacion
        $rspta = $this->editar($datos);
        if ($rspta) {
            $arrRespuesta =  'Datos guardados correctamente PHP edit.';
        }else{
            $arrRespuesta = 'No es posible almacenar la información.';
        }

        echo $arrRespuesta;
    }

    function editar($datos)
    {
        $rspta = $this->model->editar($datos);
        return $rspta;
    } //


}

?>




 

