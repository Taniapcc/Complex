<?php
class Roles extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function roles(){
        //Iniciar Sesion
        
        $sesion = new Sesion();
        
        if ($sesion->getLogin()) { 
            //llamar al metodo de la clase View
            $data['tag_page'] = "Roles Usuario";
            $data['page_title'] = "Roles Usuario <small> Tienda Virtual </small>";
            $data['page_name'] = "dashboard";
            //llamado a la vista      
            $this->views->getViews($this,"roles",$data);

            // session_destroy();

        }
        else {
             header("location:".base_url()."/Admon");
        }    
    }
    // Obtener todos los roles
    
    function listar(){
       
        $data = $this->model->listar();

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

           // <button type="button" class="btn btn-block btn-outline-primary btn-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Primario</font></font></button>

            }

        //dep($data[0]['idrol']); exit;
         echo json_encode($data,JSON_UNESCAPED_UNICODE);

        // <span class="badge badge-success">Success</span>
         
         die();
       
   }

 function mostrar($id){
     $data = $this->model->mostrar($id);
     print_r($data);
   }


   


}

?>