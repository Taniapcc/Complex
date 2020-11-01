<?php
class TablasModel extends Mysql
{
    public $idauxiliares;
    public $idtabla;
    public $idsubtabla;
    public $nombre;
    public $descripcion;

    public function __construct()
    {
        parent::__construct();
    }

    function selectTabla()
    {
        $sql = "SELECT * FROM auxiliares
         where 	 idsubtabla = 0 and condicion = 1";
        $request = $this->ejecutarConsultaMatriz($sql);
        return $request;
    }


    function mostrar($id)
    {
        $this->idauxiliares = $id;
        $sql = "SELECT * FROM auxiliares where idauxiliares = $this->idauxiliares";
        $request = $this->ejecutarConsultaSimpleFila($sql);
        return $request;
    }

    function validaNombre($nombre)
    {
        $nombre = strtoupper($nombre);
        $sql = "SELECT * FROM auxiliares WHERE nombre = '$nombre'";
        $rows = $this->queryRows($sql);
        return $rows;
    }

   
    //Implementar un método para listar los registros

    function listar1($id)
    {
        $idClean = StrClean($id);
        $this->idtabla = $idClean;        

        $sql = "select * from auxiliares where idtabla = '$idClean' and idsubtabla <> 0";
        $data = $this->ejecutarConsultaMatriz($sql);
        return $data;
    }

    function desactivar($id)
    {
        $idClean = StrClean($id);
        $this->idauxiliares = $idClean;

        $sql = " UPDATE auxiliares SET condicion = 0
        WHERE idauxiliares = '{$this->idauxiliares}' ";
        $request = $this->ejecutarConsulta($sql);
        return $request;
    }

    function activar($id)
    {
        $idClean = StrClean($id);
        $this->idauxiliares = $idClean;

        $sql = " UPDATE auxiliares SET condicion = 1
        WHERE idauxiliares = '{$this->idauxiliares}' ";
        $request = $this->ejecutarConsulta($sql);
        return $request;
    }

    function indice(){
        $sql = "SELECT max(idsubtabla) as id FROM auxiliares WHERE idtabla = 1" ; 
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
        $idsubtabla = 1;
                 
        $this->idtabla = $data['idtabla'];
        $this->nombre = strtoupper($data['nombre']);
        $this->descripcion = $data['descripcion'];

        $sql = "SELECT * FROM auxiliares WHERE nombre = '{$this->nombre}' and idtabla ='{this->idtabla}' " ;   
        $rspta = $this->ejecutarConsultaMatriz($sql);

        if(empty($rspta)){
            $sql = "SELECT max(idsubtabla) as id FROM auxiliares WHERE idtabla = '{$this->idtabla}'" ;    
            $id = $this->ejecutarConsultaSimpleFila($sql);

            if (!empty($id)){
                $idsubtabla =  $id['id'];
                $this->idsubtabla =  $idsubtabla + 1;
            }
            // ingresa datos
            $sql="INSERT into  auxiliares (idtabla,idsubtabla,nombre,descripcion) VALUES (?,?,?,?)";
            $arrData = array ($this->idtabla, $this->idsubtabla, $this->nombre, $this->descripcion);
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
        $this->idauxiliares = $data["idauxiliares"];
        $this->nombre =  strtoupper($data["nombre"]);
        $this->descripcion = $data["descripcion"];
        $this->idtabla = $data["idtabla"];
        
        $sql = "SELECT nombre FROM auxiliares WHERE nombre = '{$this->nombre}' and idtabla ='{$this->idtabla}' " ; 
       
        $rspta = $this->ejecutarConsultaMatriz($sql);

        if ($rspta)
        {
        $sql = "UPDATE auxiliares SET  nombre = ?, descripcion = ? WHERE idauxiliares = '{$this->idauxiliares}'";
            $arrData = array ($this->nombre, $this->descripcion);  
            $r = $this->queryUpdate($sql,$arrData);

        }else {

            $r = "No Existe";
        }
        return $r;
    }

    
}
