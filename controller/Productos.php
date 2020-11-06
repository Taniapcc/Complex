<?php
# Controlador generico para 3 campos
class Productos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function productos()
    {
        #
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            # code...

            $ltablas = $this->selectTabla();
            $lmedidas = $this->model->selectTablaM();
            $lpresentacion = $this->model->selectTablaP();

            $data['tag_page'] = "Productos -  Tienda Virtual ";
            $data['page_title'] = "Productos - <small> Tienda Virtual </small>";
            $data['page_name'] = "Productos";
            $data['card_title'] = "Listado de Productos";

            # parametrización
            $data['name_view'] = "productos"; //vista principal CONTROLLER LISTAR
            $data['name_table'] = "Producto";
            $data['id_table']   = "idproducto";
            $data['ltablas']   = $ltablas;
            $data['lmedidas']   = $lmedidas;
            $data['lpresentacion']   = $lpresentacion;
            //llamado a la vista
            $this->views->getViews($this, $data['name_view'], $data);
        } else {
            # code...
            header("location:" . base_url() . "/Admon");
        }
    } // productos


    function selectTabla()
    {
        $data = $this->model->selectTabla();
        return $data;
    } // select Tabla


    function indice()
    {
        $data = $this->model->indice();
        return $data;
    }

    //obtener los datos de la base de datos
    function getTabla(int $id)
    {
        $intId = intval(strClean($id));
        if ($intId > 0) {
            $arrData = $this->model->mostrar($intId);
            if (empty($arrData)) {
                $arrRspta = "No Existe el datos Get Tabla";
            } else {
                $data = $arrData;
                $arrRspta  = $data;
            }

            echo json_encode($arrRspta, JSON_UNESCAPED_UNICODE);
        }

        die();
    }

    /**
     *          GUARDAR REGISTRO
     * 
     */

    function setProductos()
    {

        $imagenes =  media() . "/upload/productos/";

        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $imagen = $_POST["imagenactual"];
        } else {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "./Assets/img/upload/productos/" . $imagen);
                // move_uploaded_file($_FILES["imagen"]["tmp_name"], media()."/upload/productos/" . $imagen);
            }
        }


        // Extraigo valores del formulario
        $idproducto = intval(strclean($_POST["idproducto"]));
        $idcategoria = strclean($_POST["idcategoria"]);
        $idpresentacion = strclean($_POST["lpresentacion"]);
        $idmedida = strclean($_POST["lmedidas"]);
        $tamanio = strClean($_POST["tamanio"]);
        $nombre = strClean($_POST["nombre"]);
        $precio = strClean($_POST["precio"]);
        $descuento = strClean($_POST["descuento"]);
        $costoe = strClean($_POST["costoe"]);
        $iva = strClean($_POST["iva"]);
        $stock = strClean($_POST["stock"]);
        $descripcion = strClean($_POST["descripcion"]);
        // $imagen =  strClean($_POST["imagen"]);

        //  idproducto  idcategoria  idpresentacion  idmedida  tamanio  codigo  nombre  precio  descuento  costoEnvio  IVA  stock  descripcion     imagen  condicion


        // Rescato variables
        $datos['idproducto'] =  $idproducto;
        $datos['idcategoria'] =      $idcategoria;
        $datos['idpresentacion'] =   $idpresentacion;
        $datos['idmedida'] =   $idmedida;
        $datos['tamanio'] =  $tamanio;
        $datos['nombre'] =       $nombre;
        $datos['precio'] =  $precio;
        $datos['descuento'] =  $descuento;
        $datos['costoe'] =  $costoe;
        $datos['iva'] =  $iva;
        $datos['stock'] =  $stock;
        $datos['descripcion'] =  $descripcion;
        $datos['imagen'] =  $imagen;


        if ($datos['idproducto'] == 0) {
            $datos['ABC'] = 'A'; //alta
        } else {
            $datos['ABC'] = 'C'; //cambio
        }

        $errores = $this->validaData($datos);
        // $errores = 0;

        if (count($errores) == 0) {

            switch ($datos['ABC']) {
                case 'A': // 
                    $rspta = $this->insertar($datos);

                    if ($rspta > 0) {
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

                    if ($rspta > 0) {
                        $arrRespuesta =  'Datos guardados correctamente PHP edit.';
                    } elseif ($rspta == 'No Existe') {
                        $arrRespuesta =  'Atención el dato No Existe.';
                    } else {
                        $arrRespuesta = 'No es posible almacenar la información.';
                    }

                    echo $arrRespuesta;
                    break;
            }
        } else {

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
        if ($r) {
            $resul = "Registro Eliminado";
        } else {
            $resul = "No se puedo eliminar el registro";
        }
        return $resul;
    }

    function activar($id)
    {
        $id = Strclean($id);
        $r = $this->model->activar($id);
        if ($r) {
            $resul = "Registro Activo";
        } else {
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

        if ($data['ABC'] == "A") {
            $r = $this->validaNombre($data['nombre']);
            if ($r > 0) {
                array_push($errores, "Información ya existe en la base de datos");
            }
        }

        if (trim($data['descripcion']) == "") {
            array_push($errores, "Descripción es requerido");
        }

        if (!is_numeric($data['precio'])) {
            array_push($errores, "precio debe ser númerico");
        }
        if (!is_numeric($data['descuento'])) {
            array_push($errores, "descuento debe ser númerico");
        }

        if (!is_numeric($data['iva'])) {
            array_push($errores, "iva debe ser  númerico");
        }


        if (!is_numeric($data['costoe'])) {
            array_push($errores, "descuento debe ser númerico");
        }




        return $errores;
    }

    function listarprueba($id)
    {
        $data = $this->model->listar($id);
        dep($data);
        exit;
    }



    function listar()
    {
        //$indice = array();

        $ltablas = $_REQUEST["ltablas"];


        if (strClean($ltablas)) {
            $data = $this->model->listar($ltablas);

            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['precio'] = formatMoney( $data[$i]['precio']);
                $data[$i]['imagen'] = "<img src='./Assets/img/upload/productos/" . $data[$i]["imagen"] . "' height='50px' width='50px' >";

                if ($data[$i]['condicion'] == 1) {

                    //onclick="fnEditar()" 

                    $data[$i]['condicion'] = '<span class="badge badge-success">Activo</span>';
                    // Añadir Acciones al formulario
                    $data[$i]['options'] = '<div class = "text-center"> 
                            <div class="btn-group">
                                <button type="button" class="btn-outline-primary btn-sm btnTablas" tabindex ="0"  rl="' . $data[$i]["idproducto"] . '" title = "Editar" onclick="fnEditar()"   ><i class = "fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn-outline-danger btn-sm btnEliminar" tabindex ="0" rle = "' . $data[$i]["idproducto"] . '" title = "Eliminar" onclick="desactivar()" ><i class = " fas fa-trash-alt""></i></button>                        
                        </div>
                            
                        </div>';
                } else {

                    $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>';
                    // Añadir Acciones al formulario
                    $data[$i]['options'] = '<div class = "text-center"> 
                            <div class="btn-group">
                            <button type="button" class="btn-outline-primary btn-sm btnTablas" tabindex ="0"  rl="' . $data[$i]["idproducto"] . '" title = "Editar" onclick="fnEditar()"  ><i class = "fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn-outline-warning btn-sm btnActivar" tabindex ="0" rla="' . $data[$i]["idproducto"] . '" title = "Recuperar" onclick="activar()"><i class = "fas fa-undo"></i></button>                        
                        </div>                            
                        </div>';
                }
            } // for

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        } // if listas    
    } // LISTAR



}   // fin clases    
