<?php

class Dashboard extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function dashboard(){
        
       // Iniciar sesion
       $sesion = new Sesion();
       
       //echo $_SESSION['usuario']['nombre'];


       //             
       if ($sesion->getLogin()) {     

                //$data['page_id'] = 2;
                $data['tag_page'] = "Dashboard -  Tienda Virtual ";
                $data['page_title'] = "Dashboard - <small> Tienda Virtual </small>";
                $data['page_name'] = "dashboard";
                //llamado a la vista    
                $this->views->getViews($this,"dashboard",$data);

                // destruyo session
               // session_destroy();
            }

       else
       {
                header("location:".base_url()."/Admon");
       }         
    }

    


}

?>