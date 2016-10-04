<?php

require_once __DIR__.'/../../Model/User.class.php';
require_once __DIR__.'/../Validator.class.php';
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

    function isValid(User $anUser){ 
        
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
        return empty($this->errors);
    }

}
