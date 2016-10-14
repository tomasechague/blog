<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'User.class.php';

class UserFactory {
    
    public static function getAll(){
        $pdo = conectar();
        $statement = $pdo->prepare("SELECT * FROM USERS");
        $statement->execute();
        $result = $statement->fetchAll();
        $users = [];
        foreach ($result as $user) {
           $usuario = new User(); 
           $users[] = $usuario->setValues($user);
        }
        return $users ;
    }
    
}