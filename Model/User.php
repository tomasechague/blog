<?php

require_once('../validator/validator.php');

class User {
    

    protected $id;

    protected $username;

    protected $email;
    
	protected $posts;
    
    function __construct() {
        $this->posts = new ArrayCollection();
        
    }

    
    function getId() {
        return $this->id;
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

    function addPost($post){
        $this->posts[] = $post;
    }
    
    function is_valid(){
     if(validateUsername($this->getUsername())&& validateEmail($this->getEmail())){
         return TRUE;
     }
        return FALSE;
    }
    
    

}
