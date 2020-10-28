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
        $sql = "SELECT * FROM auxiliares where idauxiliares = '$id'";
        $request = $this->ejecutarConsultaSimpleFila($sql);

        return $request;
    }

    function validaNombre($nombre)
    {
        $nombre = strtoupper($nombre);
        $sql = "SELECT * FROM auxiliares WHERE nombre = '$nombre'";

        $rows = $this->queryRows($sql);
        return $rows;
        //return ($rows>0)?true:false;
    }

   


    //Implementar un método para listar los registros

    function listar1($id)
    {
        $sql = "select * from auxiliares where idtabla = $id and idsubtabla <> 0";
        $data = $this->ejecutarConsultaMatriz($sql);
        return $data;
    }

    function desactivar($id)
    {
       
        $sql = " UPDATE auxiliares SET condicion = 0
        WHERE idauxiliares = '$id' ";

        $request = $this->ejecutarConsulta($sql);
        return $request;
    }

    function activar($id)
    {
        $sql = " UPDATE auxiliares SET condicion = 1
        WHERE idauxiliares = '$id' ";
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

        $sql = "SELECT * FROM auxiliares WHERE nombre = '{$this->nombre}'" ;   
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

        $idauxiliares = $data["idauxiliares"];
        $nombre =  strtoupper($data["nombre"]);
        $descripcion = $data["descripcion"];
       
        $sql = "UPDATE auxiliares SET  
                          nombre = '$nombre', 
                          descripcion = '$descripcion'                           
                     WHERE idauxiliares = '$idauxiliares'";

        $r = $this->ejecutarConsulta($sql);

        return $r;
    }

    
}
