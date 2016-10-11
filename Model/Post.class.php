<?php

/**
 * Description of Post
 *
 * @author Tomas
 * 
 * Si agrego un campo en la base de datos, tengo que agregarlo en la variable fields
 */



require_once __DIR__ . '/../ORM/ORM.class.php';
require_once __DIR__ . '/../Validator/Post/PostValidator.class.php';



class Post extends ORM {

    protected $id;

    protected $title;

    protected $content;

    protected $createAt;
    
    protected $userId;
    
    protected $tableName;
    
    protected  $fields;
    
    protected  $validator;
            
    function __construct(){
        $this->tableName = 'posts';
        $this->fields = ['user_id','title','content','createAt'];
        $this->validator = new PostValidator();
    }
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }

    function getCreateAt() {
        return $this->createAt;
    }

    function getUserId() {
        return $this->userId;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setCreateAt($createAt) {
        $this->createAt = $createAt;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }
    function isValid() {

        if ($this->validator->isValid($this)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
   
}