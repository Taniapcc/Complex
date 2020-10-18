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
            $data['tag_page'] = "Usuario Sistema";
            $data['page_title'] = "Usuarios Sistema";
            $data['page_name'] = "Usuarios Sistema";
        
            //llamar a la vista que queremos ver
            $this->views->getViews($this, "userSistema", $data);

            // destruyo session
            // session_destroy();            
        
        } else {
            # code...
            header("location:".base_url()."/Admon");
        }       
    }

    function listar(){
       
        $data = $this->model->listar();
        dep($data);
        exit;

        for ($i=0; $i < count($data); $i++) {

                // Identifico el estado del rol
            if ($data[$i]['condicion']==1) {
                    $data[$i]['condicion'] ='<span class="badge badge-success">Activo</span>';
            }else{
                    $data[$i]['condicion'] ='<span class="badge badge-danger">Inactivo</span>';
            }
            // Añadir Acciones al formulario
            $data[$i]['options'] = '<div class = "text-center"> 
                        <button  class="btn btn-outline-secondary btn-sm btnPermisoRol" rl="'.$data[$i]['idrol'].'" title= "Permiso"><i class = "fas fa-key"></i> </button>
                        <button  class="btn btn-outline-primary btn-sm btnPermisoRol" rl="'.$data[$i]['idrol'].'" title= "Editar"><i class = "fas fa-pencil-alt"></i> </button>
                        <button  class="btn btn-outline-danger btn-sm btnPermisoRol" rl="'.$data[$i]['idrol'].'" title= "Eliminar"><i class = "fas fa-trash-alt"></i> </button>
                    
            </div>';        

            }

           echo json_encode($data,JSON_UNESCAPED_UNICODE);          
         die();       
   }




}

?>