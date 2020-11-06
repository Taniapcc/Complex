<?php 
class Valida
{
    public static function validaRequerido($valor)
    {
        if (trim($valor) == '') {
            return false;
        } else {
            return true;
        }
    }
    public static function validarEntero($valor, $opciones=null)
    {
        if (filter_var($valor, FILTER_VALIDATE_INT, $opciones) === false) {
            return false;
        } else {
            return true;
        }
    }
    public static function validaEmail($valor)
    {
        if (filter_var($valor, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        } else {
            return true;
        }
    }

    public static function numero ($cadena)
    {
        $buscar = array(' ','$',',');
        $reemplazar = array('','','');
        $numero = str_replace($buscar,$reemplazar,$cadena);
        return $numero;
    }


}









?>