<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'Post.class.php';

class PostFactory {
    
    public static function getAll(){
        $pdo = conectar();
        $statement = $pdo->prepare("SELECT * FROM POSTS");
        $statement->execute();
        $result = $statement->fetchAll();
        $posts = [];
        foreach ($result as $post) {
           $posteo = new Post(); 
           $posts[] = $posteo->setValues($post);
        }
        return $posts ;
    }
    
}

