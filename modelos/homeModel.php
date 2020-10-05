<?php
    class homeModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function setUser(string $nombre, int $edad)
        {
            $sql = "INSERT INTO usuarios(nombre,edad) VALUES (?,?)";
            $arrData = array($nombre,$edad);
            $request = $this->insertar($sql, $arrData);
            return $request;
        }

        /*
               public function getCarrito($params){
                    return "Datos desde homeModel para el carrito ".$params;
                }

            }*/
    } 
    

?>
