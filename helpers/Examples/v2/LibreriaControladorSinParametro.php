<?

/**
 * 
 *   LISTAR SIN PARAMETROS
 */

function listarSinParametro(){
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
                    <a href="' . base_url() .$controlador.'cambio/' . $id . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnCategoria"><i class = "fas fa-pencil-alt"></i></a> 
                    <a href="' . base_url() .$controlador.'desactivar/' . $id . ' " title= "Eliminar"  " class="btn-outline-danger btn-sm btnCategoria"><i class = " fas fa-trash-alt""></i></a> 
                    <button type="button" class="btn-outline-primary btn-sm btnTablas" tabindex ="0"  rl="' . $id . '" title = "Editar" onclick="fnEditar()"   ><i class = "fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn-outline-danger btn-sm btnEliminar" tabindex ="0" rle = "' . $id . '" title = "Eliminar" onclick="desactivar()" ><i class = " fas fa-trash-alt""></i></button>                        
        </div>';
       
       
        } else {
            $data[$i]['condicion'] = '<span class="badge badge-danger">Inactivo</span>'; 
             // Añadir Acciones al formulario
            $data[$i]['options'] = '<div class = "text-center">
            <a href="' . base_url() . $controlador.'cambio/' . $id . ' " title= "Editar"  " class="btn-outline-primary btn-sm btnCategoria"><i class = "fas fa-pencil-alt"></i></a> 
            <a href="' . base_url() .$controlador.'activar/' . $id . ' " title= "Activar"  " class="btn-outline-success btn-sm btnCategoria"><i class = "fas fa-undo"></i></a> 
            <button type="button" class="btn-outline-primary btn-sm btnTablas" tabindex ="0"  rl="' . $id . '" title = "Editar" onclick="fnEditar()"  ><i class = "fas fa-pencil-alt"></i></button>
            <button type="button" class="btn-outline-warning btn-sm btnActivar" tabindex ="0" rla="' . $id . '" title = "Recuperar" onclick="activar()"><i class = "fas fa-undo"></i></button>                        


         </div>';
        }
       
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
} 

    
    
    /*****
     *  FIN CONTROLADOR SIN PARAMETROS
     **
     */



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








    ?>