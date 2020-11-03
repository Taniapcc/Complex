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

    function selectTablaP()
    {
        $sql = "SELECT idpresentacion, nombre FROM v_presentacion";
        $request = $this->ejecutarConsultaMatriz($sql);
        return $request;
    }

    function selectTablaM()
    {
        $sql = "SELECT idmedidas, nombre FROM v_medidas";
         $request = $this->ejecutarConsultaMatriz($sql);
        return $request;
    }


    function mostrar($id)
    {
        $this->idproducto = $id;
        $sql = "SELECT * FROM v_productos where idproducto = $this->idproducto";
        $request = $this->ejecutarConsultaSimpleFila($sql);
        return $request;
    }

    function validaNombre($nombre)
    {
        $nombre = strtoupper($nombre);
        $sql = "SELECT * FROM producto WHERE nombre = '$nombre'";
        $rows = $this->queryRows($sql);
        return $rows;
    }

   
    //Implementar un método para listar los registros
    function listarp()
    {
        $sql = "SELECT * FROM v_productos  ";
        $data = $this->ejecutarConsultaMatriz($sql);        
        return $data;
    }


    function listar($id)
    {
        $idClean = StrClean($id);
        $this->idcategoria = $idClean;        

        $sql = "SELECT * FROM v_productos WHERE idcategoria = '{$this->idcategoria}' ";
        $data = $this->ejecutarConsultaMatriz($sql);
        return $data;
    }

    function desactivar($id)
    {
        $idClean = StrClean($id);
        $this->idproducto = $idClean;

        $sql = " UPDATE producto SET condicion = 0
        WHERE idproducto = '{$this->idproducto}' ";
        $request = $this->ejecutarConsulta($sql);
        return $request;
    }

    function activar($id)
    {
        $idClean = StrClean($id);
        $this->idproducto = $idClean;

        $sql = " UPDATE producto SET condicion = 1
        WHERE idproducto = '{$this->idproducto}' ";
        $request = $this->ejecutarConsulta($sql);
        return $request;
    }

    function indice(){
        $sql = "SELECT max(idsubtabla) as id FROM producto WHERE idcategoria = 1" ; 
        $request = $this->ejecutarConsultaSimpleFila($sql);        
        return $request;
    }

    /**
     * 
     *      Empieza CRUD
     * 
     */
    
    function insertar($data)
	{	
        $r = ""; //respuesta
       // $idsubtabla = 1;
                 
        $this->idcategoria = $data['idcategoria'];
        $this->idpresentacion = $data['idpresentacion'];
        $this->idmedida = $data['idmedida'];
        $this->tamanio = $data['tamanio'];
        $this->nombre = strtoupper($data['nombre']);
        $this->precio = $data['precio'];
        $this->descuento = $data['descuento'];
        $this->costoe = $data['costoe'];
        $this->iva = $data['iva'];
        $this->stock = $data['stock'];
        $this->descripcion = $data['descripcion'];
        $this->imagen = $data['imagen'];

        
       // idproducto  idcategoria  idpresentacion  idmedida  tamanio  codigo  nombre  precio  descuento  costoEnvio  IVA  stock  descripcion     imagen  condicion


        $sql = "SELECT * FROM producto WHERE nombre = '{$this->nombre}' and idcategoria ='{$this->idcategoria}' " ;   
        $rspta = $this->ejecutarConsultaMatriz($sql);

        if(empty($rspta)){

                      
             
            // ingresa datos
            $sql="INSERT into  producto (idcategoria,  idpresentacion , idmedida , tamanio,  nombre , precio,  descuento , costoEnvio,  IVA , stock , descripcion, imagen ) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
           
            $arrData = array (
            $this->idcategoria,
            $this->idpresentacion ,
            $this->idmedida ,
            $this->tamanio ,
            $this->nombre ,
            $this->precio,
            $this->descuento,
            $this->costoe ,
            $this->iva,
            $this->stock ,
            $this->descripcion ,
            $this->imagen                
                );
            $r = $this->queryInsert($sql,$arrData);
           }

        else{
            $r = "Existe";
        }
          	
		return $r;
    }
    
    function editar($data)
    {
        $r = false;
        $this->idproducto = $data["idproducto"];
        $this->idcategoria = $data['idcategoria'];
        $this->idpresentacion = $data['idpresentacion'];
        $this->idmedida = $data['idmedida'];
        $this->tamanio = $data['tamanio'];
        $this->nombre = strtoupper($data['nombre']);
        $this->precio = $data['precio'];
        $this->descuento = $data['descuento'];
        $this->costoe = $data['costoe'];
        $this->iva = $data['iva'];
        $this->stock = $data['stock'];
        $this->descripcion = $data['descripcion'];
        $this->imagen = $data['imagen'];



        
        $sql = "SELECT nombre FROM v_productos 
        WHERE idproducto ='{$this->idproducto}' " ; 
       
        $rspta = $this->ejecutarConsultaMatriz($sql);

        if ($rspta)
        {
        $sql = "UPDATE producto 
                SET  
                     idpresentacion =?,
                     idmedida =?,
                     tamanio =?,
                     nombre = ?,
                     precio = ?,                    
                     descuento = ?,
                     costoEnvio= ?,
                     IVA = ?,
                     stock = ?,
                     descripcion = ?,
                     imagen = ?
                WHERE idproducto = '{$this->idproducto}'";

            $arrData = array (
                $this->idpresentacion,
                $this->idmedida ,
                $this->tamanio ,
                $this->nombre ,
                $this->precio ,
                $this->descuento ,
                $this->costoe ,
                $this->iva ,
                $this->stock ,
                $this->descripcion ,
                $this->imagen 
            );  
            $r = $this->queryUpdate($sql,$arrData);

        }else {

            $r = "No Existe";
        }
        return $r;
    }

    
}
