<?php  
class Logout extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function logout()
    {
        //llamar al metodo de la clase View
                            
        $sesion = new Sesion();
    

        if ($sesion->getLogin()) {
              
        //} else{

            $data['tag_page'] = "Login -  Tienda Virtual ";
            $data['page_title'] = "Login- <small> Tienda Virtual </small>";
            $data['page_name'] = "Login";
            //llamado a la vista
            $sesion -> finalizarLogin();
           
            session_destroy();
            header("location:".base_url());
          // $this->views->getViews($this, "Home", $data);
            //   }
        }

        function logout(){
            $sesion = new Sesion();
            $sesion->finalizarLogin();
            session_destroy();           
            
            header("location:".base_url());
        

        }
    }





}
?>