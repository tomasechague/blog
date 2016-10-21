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
    protected $avatarLink;
    protected $validator;

    function __construct() {
        $this->validator = new UserValidator();
        $this->tableName = 'users';
        $this->fields = ['username', 'email', 'avatar_link'];
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

    function getAvatarLink() {
        return $this->avatarLink;
    }

    function setAvatarLink($avatarLink) {
        $this->avatarLink = $avatarLink;
    }

    function saveAvatarLink($avatarLink) {
        
       
    }

    function getPosts() {
        $id = $this->getId();
        $pdo = conectar();
        $statement = $pdo->prepare("SELECT *
                                    FROM posts 
                                    WHERE user_id = $id");
        $statement->execute();
        $result = $statement->fetchAll();
        $posts = [];
        foreach ($result as $post) {
            $posteo = new Post();
            $posts[] = $posteo->setValues($post);
        }
        return $posts;
    }

    function addPost($post) {
        $this->posts[] = $post;
    }

    function isValid($file) {
        if ($this->validator->isValid($this, $file)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
