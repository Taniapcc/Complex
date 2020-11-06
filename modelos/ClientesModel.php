<?php
class ClientesModel extends Mysql
{
    public $idusuario;
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
        $this->idusuario = $id;
        $sql = "SELECT * FROM v_productos where idusuario = $this->idusuario";
        $request = $this->ejecutarConsultaSimpleFila($sql);
        return $request;
    }

    function validaNombre($nombre)
    {
        $nombre = strtoupper($nombre);
        $sql = "SELECT * FROM usuario WHERE nombre = '$nombre'";
        $rows = $this->queryRows($sql);
        return $rows;
    }

   
    //Implementar un método para listar los registros
   
    function listar()
    {
        $sql = "SELECT idusuario,cedula,nombre,direccion, telefono,condicion FROM v_cliente ";
        $data = $this->ejecutarConsultaMatriz($sql);
        return $data;
    }

    function desactivar($id)
    {
        $idClean = StrClean($id);
        $this->idusuario = $idClean;

        $sql = " UPDATE usuario SET condicion = 0
        WHERE idusuario = '{$this->idusuario}' ";
        $request = $this->ejecutarConsulta($sql);
        return $request;
    }

    function activar($id)
    {
        $idClean = StrClean($id);
        $this->idusuario = $idClean;

        $sql = " UPDATE usuario SET condicion = 1
        WHERE idusuario = '{$this->idusuario}' ";
        $request = $this->ejecutarConsulta($sql);
        return $request;
    }

    function indice(){
        $sql = "SELECT max(idsubtabla) as id FROM usuario WHERE idcategoria = 1" ; 
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

        
       // idusuario  idcategoria  idpresentacion  idmedida  tamanio  codigo  nombre  precio  descuento  costoEnvio  IVA  stock  descripcion     imagen  condicion


        $sql = "SELECT * FROM usuario WHERE nombre = '{$this->nombre}' and idcategoria ='{$this->idcategoria}' " ;   
        $rspta = $this->ejecutarConsultaMatriz($sql);

        if(empty($rspta)){

                      
             
            // ingresa datos
            $sql="INSERT into  usuario (idcategoria,  idpresentacion , idmedida , tamanio,  nombre , precio,  descuento , costoEnvio,  IVA , stock , descripcion, imagen ) 
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
        $this->idusuario = $data["idusuario"];
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
        WHERE idusuario ='{$this->idusuario}' " ; 
       
        $rspta = $this->ejecutarConsultaMatriz($sql);

        if ($rspta)
        {
        $sql = "UPDATE usuario 
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
                WHERE idusuario = '{$this->idusuario}'";

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
