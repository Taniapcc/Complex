<?php
Class ValidaData{

	
	public  function validaRequerido($campo,$data){
        if (trim($data) == '') {
            $this-> aErrores =  $campo." es Requerido ";
            return $this->aErrores;
        }
	 } 

	 public  function validaLetras($campo,$data){
		$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

		if (preg_match($patron_texto, $data) == FALSE){
			$this-> aErrores =  $campo." solo puede ir letras y espacios ";
			return $this ->aErrores;
		}
	 } 

	 public function validarEntero($valor, $opciones=null,$campo){
		if(filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE){
            $this-> aErrores[] = array_push($this->aErrores, $campo." solo puede números "); 
		   return false;
		}else{
		   return true;
		}
	 }

	 public function validaEmail($campo,$valor){
		if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
            $this-> aErrores[] = array_push($this->aErrores, $campo." es incorrecto "); 
		   return false;
		}else{
		   return true;
		}
	 }

}

?>