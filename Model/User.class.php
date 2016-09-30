<?php

require_once __DIR__.'/../Validator/Validator.class.php';

require_once __DIR__.'/../Validator/User/UserValidator.class.php';

class User {

    protected $id;
    protected $username;
    protected $email;
    protected $posts;
    protected $validator;

    function __construct() {
        $this->validator = new UserValidator();
        $this->posts = [];
    }

    
    
    function getId() {
        return $this->id;
    }
    
    function getValidator() {
        return $this->validator;
    }

    
    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getPosts() {
        return $this->posts;
    }

    function addPost($post) {
        $this->posts[] = $post;
    }

    function isValid() {

        if ($this->validator->isValid($this)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
