<?php

//aca van todas las validaciones esenciales 

/**
 * @author   Echague Tomas <tomiechague@gmail.com>
 * @access   public
 */
class Validator {

    protected $errors;

    function __construct() {
        $this->errors = [];
    }

    /*     * Obtiene el arreglo de errores de un objeto
     * ejecutar siempre el metodo isValid() para no traer errores desactualizados
     */

    function getErrors() {
        return $this->errors;
    }

    /** vacia el arreglo de errores 
     * @access public 
     */
    function resetErrors() {
        $this->errors = [];
    }

    function addError($key, $error) {
        if (isset($this->errors[$key])) {
            $this->errors[$key] .=', ' . $error;
        } else {
            $this->errors[$key] = $error;
        }
    }

//only letters
    function onlyLetters($in) {
        if (preg_match('/^([a-z ñáéíóú]{2,255})$/i', $in))
            return TRUE;
        else
            return FALSE;
    }

//validate username

    function validateNoEmpty($string) {
        $errors = array();

        if (strlen($string) == 0) {
            return FALSE;
        }
        return TRUE;
    }

//validate email
    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function validateFileType($file, $typesArray) {
        if (!(in_array($file['type'], $typesArray))) {
            return FALSE;
        }
        return TRUE;
    }

    function validateFileSize($file, $kbSize) {
        $uploadedfile_size = $file['size'];
        if ($uploadedfile_size > $kbSize) {
            return FALSE;
        }
        return TRUE;
    }

}
