<?php
/**
 * Controlodar que maneja la plantilla inicial del proyecto
 */
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
    public function Listar(){
        $data = $this->model->listar();
        print_r($data);
   }




}

?>