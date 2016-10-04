<?php

require_once __DIR__.'/../../Model/Post.class.php';
require_once __DIR__.'/../Validator.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostValidator
 *
 * @author Tomas
 */
class PostValidator extends Validator {

    function __construct() {
        parent::__construct();
    }

    function isValid(Post $anPost) {
        $this->resetErrors();
        if (!$this->validateNoEmpty($anPost->getTitle())) {
            $this->addError('title', 'El titulo es obligatorio'
                    . '');
        }
        if (!$this->validateNoEmpty($anPost->getContent())) {
            $this->addError('content', 'La publicacion debe tener contenido');
        }
        if (!$this->validateNoEmpty($anPost->getUserId())) {
            $this->addError('userId', 'No se encuentra el usuario');
        }
        return empty($this->errors);
    }

}
