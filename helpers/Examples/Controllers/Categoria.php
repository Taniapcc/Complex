<?php

class Categoria extends Controllers{
    public function __construct()
    {
        parent::__construct();    
    }
    public function categoria(){
        //llamar al metodo de la clase View
        $data['page_id'] = 4;
        $data['tag_page'] = "Categoria -  Tienda Virtual ";
        $data['page_title'] = "Categoria - <small> Tienda Virtual </small>";
        $data['page_name'] = "categoria";
        //llamado a la vista      
        $this->views->getViews($this,"categoria",$data);
    }

    public function eliminar($id){
        $data = $this->model->eliminar($id);
        print_r($data);
        return $data;
    }

    public function listar(){
        $data = $this->model->listar();
        print_r($data);
        return $data;
   }

  function mostrar($id){
    $data = $this->model->mostrar($id);
    print_r($data);
    return $data;
}

public function insertar(){
    $nombre = "Leche";
    $descripcion = "PPPPPPPPP";
    $data = $this->model->insertar($nombre,$descripcion );
    print_r($data);
    return $data;
}

public function actualizar(){
    $id = 1;
    $descripcion = "Aqui va la descripcion de la leche ";
    $data = $this->model->actualizar($id,$descripcion);
    print_r($data);
    return $data;
}






}

?>