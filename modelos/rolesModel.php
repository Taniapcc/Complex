<?php
    class rolesModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function selectRolesAll()
                        
        {
            $sql = " SELECT * FROM rol where status !=0 ";
            $request = $this->select_all($sql);
            return $request;
        }

/*
        public function setUser(string $nombre, int $edad)
        {
           $sql = "INSERT INTO usuarios(nombre,edad) VALUES (?,?)";
            $arrData = array($nombre,$edad);
            $request = $this->insert($sql, $arrData);
            return $request;
        }


        public function getUser( int $id)
        {
            $sql = "SELECT * FROM usuarios where id = '$id'";
            $request = $this->select($sql);
            return $request;
        }

        public function getUserAll()
        {
            $sql = " SELECT * FROM usuarios ";
            $request = $this->select_all($sql);
            return $request;
        }

        public function updateUser(int $id, string $nombre, int $edad)
        {
            $sql = "UPDATE  usuarios SET nombre = ?, edad = ? WHERE id ='$id'";
            $arrData = array($nombre,$edad);
            $request = $this->update($sql, $arrData);
            return $request;
        }

        public function deleteUser(int $id)
        {
            $sql = "DELETE FROM  usuarios  WHERE id ='$id'";
            $request = $this->deletes($sql);
            return $request;
        }

*/

        



    }

    
    

?>
