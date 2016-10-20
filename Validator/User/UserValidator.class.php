<?php

require_once __DIR__ . '/../../Model/User.class.php';
require_once __DIR__ . '/../Validator.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserValidator
 *
 * @author Tomas
 */
class UserValidator extends Validator {

    function __construct() {
        parent::__construct();
    }

    function isValid(User $anUser) {

        $this->resetErrors();

        if (!$this->validateNoEmpty($anUser->getUsername())) {
            $this->addError('username', 'El campo no debe estar vacio');
        }
        if (!$this->onlyLetters($anUser->getUsername())) {
            $this->addError('username', 'El campo debe contener solo letras');
        }
        if (!$this->validateEmail($anUser->getEmail())) {
            $this->addError('email', 'Email incorrecto');
        }
        if(!$this->validateFile($anUser->getAvatarLink())){
            $this->addError('file', 'Problema al cargar el archivo');
        }

        return empty($this->errors);
    }
    
    function validateFile($file) {

    $uploadedfile_size = $file[archivo][size];
    echo $file[archivo][name];
    if ($uploadedfile_size > 2000000) {
        $this->addError('file', 'El archivo es mayor que 2000KB, debes reduzcirlo antes de subirlo');
        return FALSE;
    }

//    if (!($file[archivo][type] == "image/pjpeg" OR $file[archivo][type] == "image/gif")) {
//        $this->addError('file', 'Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos');
//        return FALSE;
//    }
    
    return TRUE;

    
}

}


?>
