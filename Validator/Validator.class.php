<?php

//aca van todas las validaciones esenciales 
class Validator{
    
    protected $errors;
    
    
 function __construct() {
     $this->errors = [];
 }   
 
 
 
 function getErrors() {
     return $this->errors;
 }

 function addError($key,$error){
     if(isset($this->errors[$key])){
     $this->errors[$key] .=', '. $error;
     }else{
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


}