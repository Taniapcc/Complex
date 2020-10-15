<?php

class Login extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    
    public function login(){
        //llamar al metodo de la clase View
        $data['page_id'] = 3;
        $data['tag_page'] = "Login -  Tienda Virtual ";
        $data['page_title'] = "Login- <small> Tienda Virtual </small>";
        $data['page_name'] = "Login";     
        //llamado a la vista      
        $this->views->getViews($this,"login",$data);
    }

     
      }


   


?>