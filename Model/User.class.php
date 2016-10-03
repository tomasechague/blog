<?php

require_once __DIR__.'/../Validator/Validator.class.php';
require_once __DIR__.'/../config/database.php';
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
    
    function save($anUser){
        $pdo = conectar();
    
     try{
         $statement = $pdo->beginTransaction();
         $statement = $pdo->prepare("COUNT(*) from users");
         if(!$statement){
           //hay que hacer un insert del usuario
        
    $statement = $pdo->prepare("INSERT INTO users(username,email) 
                                VALUES(:username, :email)");
    $statement->bindParam(':username',getUsername());
    $statement->bindParam(':email',getEmail());
    $statement->execute();
    $result = $statement->fetchColumn();


    return $result;
    }

}