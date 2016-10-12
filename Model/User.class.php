<?php

/**
 * Description of Post
 *
 * @author Tomas
 * 
 * Si agrego un campo en la base de datos, tengo que agregarlo en la variable fields
 */


require_once __DIR__ . '/../ORM/ORM.class.php';
require_once __DIR__ . '/../Validator/User/UserValidator.class.php';

class User extends ORM {
    
    protected $id;
    protected $username;
    protected $email;
    protected $posts;
    protected $validator;
    
    function __construct() {
        $this->validator = new UserValidator();
        $this->posts = [];
        $this->tableName = 'users';
        $this->fields = ['username','email'];
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

    function getPosts($id) {
        //$id = $this->id;
        $pdo = conectar();
        $statement = $pdo->prepare("SELECT *
                                    FROM posts 
                                    WHERE user_id = $id");
        $statement->execute();        
        $result = $statement->fetchAll();
        foreach($result as $post){
        $this->addPost($post);
        }
        
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
