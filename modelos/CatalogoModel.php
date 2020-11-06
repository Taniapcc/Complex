<?php
class CatalogoModel extends Mysql
{
    public $idproducto;
    public $idcategoria;
    public $idpresentacion;
    public $idmedida;
    public $tamanio;
    public $nombre;
    public $precio;
    public $descuento;
    public $costoe;
    public $iva;
    public $stock;
    public $descripcion;
    public $imagen;

    
    public function __construct()
    {
        parent::__construct();
    }

    function selectTabla()
    {
        $sql = "SELECT idcategoria, nombre FROM categoria
         where 	condicion = 1";
        $request = $this->ejecutarConsultaMatriz($sql);

        
        return $request;
    }

    
    //Implementar un método para listar los registros
    function listarp()
    {
        $sql = "SELECT * FROM v_productos order by categoria ";
        $data = $this->ejecutarConsultaMatriz($sql);        
        return $data;
    }



    
   

    
}
