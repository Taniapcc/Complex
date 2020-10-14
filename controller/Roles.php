<?php
class Roles extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function roles(){
        //llamar al metodo de la clase View
        $data['page_id'] = 3;
        $data['tag_page'] = "Roles Usuario";
        $data['page_title'] = "Roles Usuario <small> Tienda Virtual </small>";
        $data['page_name'] = "dashboard";
        //llamado a la vista      
        $this->views->getViews($this,"roles",$data);
    }
    // Obtener todos los roles
    
    public function listar(){
        $data = $this->model->listar();
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
        //var_dump(json_encode($data,JSON_UNESCAPED_UNICODE));      

        //dep($data);
   }

   public function mostrar($id){
     $data = $this->model->mostrar($id);
    
    print_r($data);
}


   


}

?>