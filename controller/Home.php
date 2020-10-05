<?php

class Home extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function home(){
        //llamar al metodo de la clase View
        $data['page_id'] = 1;
        $data['tag_page'] = "Home";
        $data['page_title'] = "Página principal";
        $data['page_name'] = "home";
        $data['page_content'] = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        Eaque ipsa dolor, temporibus, facilis, eligendi unde asperiores blanditiis error 
        officia praesentium pariatur ratione consectetur veniam. Ipsa laborum officia rem ea quia!";
        //llamar a la vista que queremos ver
        
        $this->views->getViews($this,"home",$data);
    }
/*
    public function insertar(){
      
        $data = $this->model->setUser("Carlos",18);
         print_r($data);
    }

    public function verUsuario($id){
         $data = $this->model->getUser($id);
         print_r($data);
    }
    public function actualizar(){
         $data = $this->model->updateUser(1,"Roberto",10);
         print_r($data);
    }
   
    public function verUsuarioAll(){
         $data = $this->model->getUserAll();
         print_r($data);
    }
    public function deleteUser($id){
         $data = $this->model->deleteUser($id);
         print_r($data);
    }

    public function borradoLogicoUser($id){
        $data = $this->model->borradoLogico($id);
        print_r($data);
   }
*/

}

?>