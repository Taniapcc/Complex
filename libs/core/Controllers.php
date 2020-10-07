<?php
    class Controllers {
        /** Cargar vistas */

        public function __construct()
        {
            $this->views = new Views();
            $this->loadModel() ;
        }

        /** Cargar los modelos */
        public function loadModel()
        {
            $model = get_class($this)."Model";
            $routClass = "modelos/".$model.".php";
            if(file_exists($routClass)){
                require_once($routClass);
                $this->model = new $model();
            }
        }

    }
 
?>