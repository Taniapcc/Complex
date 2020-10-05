<?php
class Errors extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function notFound(){
        //llamar al metodo de la clase View
        $this->views->getViews($this,"error");
    }
    
}

$notFound = new  Errors();
$notFound -> notFound();

?>