<?php
class PermisoModel extends Mysql
{
    public $idusuario;
    public $nombre;
    public $permisos;
       
    public function __construct()
    {
        parent::__construct();
    }

        
    function mostrar($id)
    {
        $this->idusuario = $id;
        $sql = "SELECT * FROM v_usuario where idusuario = '{$this->idusuario}'";
        $request = $this->ejecutarConsultaSimpleFila($sql);
        return $request;
    }

   
    //Implementar un método para listar los registros
    function listar()
    {
        $sql = "SELECT * FROM v_empleado WHERE condicion = 1 ";
        $data = $this->ejecutarConsultaMatriz($sql);
        return $data;
    }

    function listarPermisos()
    {
        $sql = "SELECT idauxiliares AS idpermiso,nombre FROM v_permiso ";
        $data = $this->ejecutarConsultaMatriz($sql);
        return $data;
    }

    function listarMarcados($id)
    {
        $this->idusuario = $id;
        $sql = "SELECT * FROM v_usuario_permiso where idusuario = '{$this->idusuario}' ";
        $data = $this->ejecutarConsultaMatriz($sql);
        return $data;
    }
     
      
    /**
     *
     *      Empieza CRUD
     *
     */
    
   
    function eliminar($id)
    {
       
         $sql = "DELETE FROM usuario_permiso where idusuario = $id"; 
         $r   =  $this->ejecutarConsulta($sql);
        return $r;
    }

    /** 
     * 
     *  Muestra informacion en pantalla
     * 
     */
   
    function editar($data)
    {
        $r = false;
        $this->idusuario = $data["idusuario"];
        $this->nombre = strtoupper($data['nombre']);
        $this->permisos = $data['lpermisos'];
        $lpermisos = $this->permisos ;

        $this->eliminar($this->idusuario);

       for ($i=0; $i < count($lpermisos) ; $i++) { 
          $sql = " INSERT  INTO usuario_permiso (idusuario,idpermiso) VALUES ('{$this->idusuario}','$lpermisos[$i]')";
          $r = $this-> ejecutarConsulta($sql);          
       }

       return $r;

        
        
    }
}    

